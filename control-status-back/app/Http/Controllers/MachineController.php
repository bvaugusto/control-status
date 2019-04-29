<?php

namespace App\Http\Controllers;

use App\Machine;
use App\Repositories\MachineRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class MachineController extends Controller
{
    /**
     * Constructor
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @return void
     */
    public function __construct(Machine $machine)
    {
        $this->machine = new MachineRepositoryEloquent($machine);
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
            $arrayMachine = array();
            foreach ($this->machine ->all() as $key => $value) {
                $arrayMachine['data'][] = $value;
            }
            return response()->json($arrayMachine)
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
                'name_machine' => $request->name_machine
            ),
            array(
                'name_machine' => 'required'
            ),
            array(
                'name_machine' => 'Favor informar o nome da máquina!'
            )
        );

        if($validator->fails()){
            $msg = $validator->messages()->getMessages();
            return response()->json(['success' => false, 'message' => $msg])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }


        try
        {
            $arrayMachine = array();
            $arrayMachine['name_machine'] = $request->name_machine;

            $this->machine->create($arrayMachine);
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
        return response()->json($this->machine->show($id))
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
        return response()->json($this->machine->show($id))
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
                    'name_machine' => $request->name_machine
                ),
                array(
                    'name_machine' => 'required'
                ),
                array(
                    'name_machine' => 'Favor informar o minuto!'
                )
            );

            if($validator->fails()){
                $msg = $validator->messages()->getMessages();
                return response()->json(['success' => false, 'message' => $msg])
                    ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
            }

            $arrayMachine = array();
            $arrayMachine['name_machine'] = $request->name_machine;

            if (!$this->machine->update($arrayMachine, $id)) {
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
            $this->machine->delete($id);
            return response()->json(['success' => true, 'message' => "Cadastro removido com sucesso!"])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }
    }
}
