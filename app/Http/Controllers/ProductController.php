<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Product;
use App\Helpers\JwtAuth;

class ProductController extends Controller
{
    public $params;
    public $params_array;

    public function __construct(Request $request)
    {
        $this->middleware('api_auth', ['except' => 'index', 'show', 'getProductbyOrder']);

        // Recoger datos
        $json = $request->input('json', null);
        $this->params = json_decode($json);
        $this->params_array = json_decode($json, true);
    }

    public function getIdentity(Request $request)
    {
        $jwtAuth = new JwtAuth();
        $token = $request->header('Authorization', null);
        $user = $jwtAuth->checkToken($token, true);

        return $user;
    }

    public function store(Request $request)
    {
        // verificar datos desde POST
        if (!empty($this->params_array)) {

            // Autenticación de usuario
            $user = $this->getIdentity($request);

            // Validar datos
            $validate = \Validator::make($this->params_array, [
                'name'          => 'required',
                'description'   => 'required',
                'price'         => 'required'
            ]);

            if ($validate->fails()) {
                $data = [
                    'status'    => 'error',
                    'code'      => 404,
                    'message'   => 'NO se han guardado el producto, faltan datos'
                ];
            } else {
                // Guardar producto
                $product = new Product();
                $product->name          = $this->params->name;
                $product->description   = $this->params->description;
                $product->price         = $this->params->price;
                $product->save();

                $data = [
                    'status'    => 'success',
                    'code'      => 200,
                    'product'   => $product
                ];
            }
        } else {
            $data = [
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'NO se ha guardado el producto, faltan datos'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function index()
    {
        $product = Product::all();

        $data = [
            'status'    => 'success',
            'code'      => 200,
            'product'   => $product
        ];

        return response()->json($data, $data['code']);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (is_object($product)) {
            $data = [
                'status'    => 'success',
                'code'      => 200,
                'product'   => $product
            ];
        } else {
            $data = [
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'No existe el producto'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function update($id, Request $request)
    {
        // Recibir datos
        if (!empty($this->params_array)) {
            // Validar datos
            $validate = \Validator::make($this->params_array, [
                'name'          => 'required',
                'description'   => 'required',
                'price'         => 'required'
            ]);
        }

        if ($validate->fails()) {
            $data ['errors'] = $validate->errors();
            return response()->json($data, $data['code']);
        }

        // Omitir datos que no se actualizan
        unset($this->params_array['id']);
        unset($this->params_array['created_at']);
        unset($this->params_array['updated_at']);

        // Verificar usuario autenticado
        $user = $this->getIdentity($request);

        // Buscar registro a actualizar
        $product = Product::where('id', $id)->first();

        if (!empty($product) && is_object($product)) {
            // Actualizar datos
            $product->update($this->params_array);

            // Respuesta
            $data =[
                'status'    => 'success',
                'code'      => 200,
                'pruduct'   => $product,
                'change'    => $this->params_array
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function destroy($id, Request $request)
    {
        // Identificar usuario
        $user = $this->getIdentity($request);

        // Conseguir datos
        $product = Product::where('id', $id)->first();

        // Si existe el producto
        if (!empty($product)) {
            // Eliminar producto
            $product->delete();

            $data =[
                'status'    => 'success',
                'code'      => 200,
                'message'   => 'Se ha borrado el producto'
            ];
        }

        return response()->json($data, $data['code']);
    }
}
