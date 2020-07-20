<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Order;
use App\Call;
use App\Helpers\JwtAuth;

class OrderController extends Controller
{
    public $params;
    public $params_array;

    public function __construct(Request $request)
    {
        $this->middleware('api_auth', ['except' => ['index', 'show']]);

        // Recoger datos request
        $json = $request->input('json', null);
        $this->params = json_decode($json);
        $this->params_array = json_decode($json, true);
    }

    public function getIdentity($request)
    {
        $jwtAuth = new JwtAuth();
        $token = $request->header('Authorization', null);
        $user = $jwtAuth->checkToken($token, true);

        return $user;
    }

    public function index()
    {
        $order = Order::all();
    }

    public function show($id, Request $request)
    {
        $order = Order::find($id)
                      ->join('call', 'order_id', '=', $id)
                      ->join('product', function($query){
                          $query->on('product.id', '=', 'product_id')->where('order_id', '=', $id);
                      })->get();
    }

    public function store(Request $request)
    {
        // Datos por request
        if (!empty($this->params_array)) {
            // Verificar autenticación
            $user = $this->getIdentity($request);

            // Validar datos
            $validate = \Validator::make($this->params_array, [
                'detail'    => 'required',
                'taxes'    => 'required',
                'total'     => 'required',
                'status'    => 'required',
            ]);

            if ($validate->fails()) {
                $data = [
                    'status'    => 'error',
                    'code'      => 404,
                    'message'   => 'No se ha guardado la orden, faltan datos'
                ];
            } else {
                // Guardar producto
                $order = new Order();
                $order->detail    = $this->params->detail;
                $order->taxes     = $this->params->taxes;
                $order->total     = $this->params->total;
                $order->comments  = $this->params->comments;
                $order->save();

                $data = [
                    'status'    => 'success',
                    'code'      => 200,
                    'order'     => $order
                ];
            }

        } else {
            $data = [
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'No se ha guardado la orden, faltan datos'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function update($id, Request $request)
    {
        if (!empty($this->params_array)) {
            // Validar datos
            $validate = \Validator::make($this->params_array, [
                'detail'   => 'required',
                'taxes'    => 'required',
                'total'    => 'required',
                'status'   => 'required',
            ]);

            if ($validate->fails()) {
                $data ['errors'] = $validate->fails();
                return request()->json($data, $data['code']);
            }

            // Omitir campos no actualizables
            unset($this->params_array['id']);
            unset($this->params_array['created_at']);
            unset($this->params_array['updated_at']);

            // Autenticar usuario
            $user = $this->getIdentity($request);

            // Actualizar datos
            $order = Order::where('id', $id)->first();
        }
    }

    public function destroy($id, Request $request)
    {
        // Validar datos
        $user = $this->getIdentity($request);

        // Conseguir orden
        $order = Order::where('id', $id)->first();

        if (!empty($order)) {
            $order->delete();

            $data = [
                'status'    => 'success',
                'code'      => 200,
                'order'     => $order
            ];
        } else {
            $data = [
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'El registro no existe'
            ];
        }

        return response()->json($data, $data['code']);
    }
}
