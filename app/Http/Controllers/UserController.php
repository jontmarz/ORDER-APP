<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class UserController extends Controller
{
    public $params;
    public $params_array;

    public function __construct(Request $request)
    {
        // Recoger datos Json por post
        $json = $request->input('json', null);

        $this->params = json_decode($json); //Objeto
        $this->params_array = json_decode($json, true); // Array
    }

    public function register(Request $request)
    {
        // Validación datos
        if (!empty($this->params) && !empty($this->params_array)) {
            $this->params_array = array_map('trim', $this->params_array);

            $validate = \Validator::make($this->params_array, [
                'name'      => 'required|alpha',
                'email'     => 'required|email|unique:users',
                'password'  => 'required'
            ]);

            // Falla la validación
            if ($validate->fails()) {
                $data = [
                    'status'    => 'error',
                    'code'      => 404,
                    'message'   => 'El usuario ya está registrado',
                    'errors'    => $validate->errors()
                ];
            } else {
                $pwd = hash('sha256', $this->params->password); //Cifrado

                // Guardar usuario
                $user = new User();
                $user->name = $this->params_array['name'];
                $user->email = $this->params_array['email'];
                $user->password = $pwd;

                $user->save();

                $data = [
                    'status'    => 'success',
                    'code'      => 200,
                    'message'   => 'El usuario ha sido registrado',
                    'user'      => $user
                ];
            }
        } else {
            $data = [
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'Los datos enviados no son validos'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function login(Request $request)
    {
        $jwtAuth = new \JwtAuth();

        // Validar datos
        $validate = \Validator::make($this->params_array, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if ($validate->fails()) {
            $signup = [
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'El usuario no se ha logrado identificar',
                'errors'    => $validate->fails()
            ];
        } else {
            // Decifrar contraseña
            $pwd = hash('sha256', $this->params->password);

            // Devolver token o datos
            $signup = $jwtAuth->signup($this->params->email, $pwd);

            if (!empty($this->params->getToken)) {
                $signup = $jwtAuth->signup($this->params->email, $pwd, true);
            }
        }

        return response()->json($signup, 200);
    }
}
