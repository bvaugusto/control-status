<?php

namespace App\Http\Controllers;

use App\Status;
use App\Repositories\StatusRepositoryEloquent;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class StatusController extends Controller
{

    /**
     * Constructor
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @return void
     */
    public function __construct(Status $status)
    {
        $this->status = new StatusRepositoryEloquent($status);
    }

    /**
     * Display a listing of the resource.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $arrayStatus = array();
            foreach ($this->status->all() as $key => $value) {
                $arrayStatus['data'][] = $value;
            }
            // return json_encode($arrayStatus);
            return response()->json($arrayStatus)
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
            // return response()->json($this->status->all());
        } catch (\Exception $th) {
            return response()->json($th->getMessage())
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            array(
                'name_status' => $request->name_status
            ),
            array(
                'name_status' => 'required'
            ),
            array(
                'name_status' => 'Favor informar o status!'
            )
        );

        if($validator->fails()){
            $msg = $validator->messages()->getMessages();
            return response()->json(['success' => false, 'message' => $msg])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }


        try
        {
            $arrayStatus = array();
            $arrayStatus['name_status'] = $request->name_status;

            $this->status->create($arrayStatus);
            return response()->json(['success' => true, 'message' => 'Cadastro realizado com sucesso!'])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }
        catch (\Exception $exception)
        {
            return response()->json($exception->getMessage())
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->status->show($id))
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json($this->status->show($id))
            ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            
            $validator = Validator::make(
                array(
                    'name_status' => $request->name_status
                ),
                array(
                    'name_status' => 'required'
                ),
                array(
                    'name_status' => 'Favor informar o status!'
                )
            );
        
            if($validator->fails()){
                $msg = $validator->messages()->getMessages();
                return response()->json(['success' => false, 'message' => $msg])
                    ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
            }

            $arrayStatus = array();
            $arrayStatus['name_status'] = $request->name_status;

            if (!$this->status->update($arrayStatus, $id)) {
                return response()->json(['success' => false, 'message' => "Falha ao atualizar o cadastro!"])
                    ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
            }

            return response()->json(['success' => true, 'message' => "Cadastro atualizado com sucesso!"])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->status->delete($id);
            return response()->json(['success' => true, 'message' => "Cadastro removido com sucesso!"])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }
    }
}
