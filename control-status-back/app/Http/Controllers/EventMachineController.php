<?php

namespace App\Http\Controllers;

use App\EventMachine;
use App\Repositories\EventMachineRepositoryEloquent;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EventMachineController extends Controller
{

    /**
     * Constructor
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @return void
     */
    public function __construct(EventMachine $eventmachine)
    {
        $this->eventmachine = new EventMachineRepositoryEloquent($eventmachine);
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
            $arrayEventMachine = array();
            foreach ($this->eventmachine->all() as $key => $value) {
                $arrayEventMachine['data'][] = $value;
            }
            return response()->json($arrayEventMachine)
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
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
                'id_machine' => $request->id_machine,
                'id_status' => $request->id_status
            ),
            array(
                'id_machine' => 'required',
                'id_status' => 'required'
            ),
            array(
                'id_machine' => 'Favor informar o id da máquina!',
                'id_status' => 'Favor informar o status da máquina!'
            )
        );

        if($validator->fails()){
            $msg = $validator->messages()->getMessages();
            return response()->json(['success' => false, 'message' => $msg])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }

        try
        {
            $arrayEventMachine = array();
            $arrayEventMachine['id_machine'] = $request->id_machine;
            $arrayEventMachine['id_status'] = $request->id_status;

            $this->eventmachine->create($arrayEventMachine);
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
        return response()->json($this->eventmachine->show($id))
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
        return response()->json($this->eventmachine->show($id))
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
        $validator = Validator::make(
            array(
                'id_machine' => $request->id_machine,
                'id_status' => $request->id_status
            ),
            array(
                'id_machine' => 'required',
                'id_status' => 'required'
            ),
            array(
                'id_machine' => 'Favor informar o id da máquina!',
                'id_status' => 'Favor informar o status da máquina!'
            )
        );

        if($validator->fails()){
            $msg = $validator->messages()->getMessages();
            return response()->json(['success' => false, 'message' => $msg])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }

        try {

            $arrayEventMachine = array();
            $arrayEventMachine['id_machine'] = $request->id_machine;
            $arrayEventMachine['id_status'] = $request->id_status;

            if (!$this->eventmachine->update($arrayEventMachine, $id)) {
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
        dd("foi", $id);
        try {
            $this->eventmachine->delete($id);
            return response()->json(['success' => true, 'message' => "Cadastro removido com sucesso!"])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }
    }
}
