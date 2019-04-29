<?php

namespace App\Http\Controllers;

use App\Simulator;
use App\Repositories\SimulatorRepositoryEloquent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class SimulatorController extends Controller
{
    /**
     * Constructor
     *
     * @author Bruno Vasconcellos Augusto <bvaugusto@gmail.com>
     * @version 1.0
     * @return void
     */
    public function __construct(Simulator $simulator)
    {
        $this->simulator = new SimulatorRepositoryEloquent($simulator);
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
            $arraySimulator = array();
            foreach ($this->simulator ->all() as $key => $value) {
                $arraySimulator['data'][] = $value;
            }
            return response()->json($arraySimulator)
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
                'minutes' => $request->minutes
            ),
            array(
                'minutes' => 'required'
            ),
            array(
                'minutes' => 'Favor informar o minuto!'
            )
        );

        if($validator->fails()){
            $msg = $validator->messages()->getMessages();
            return response()->json(['success' => false, 'message' => $msg])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }


        try
        {
            $arraySimulator = array();
            $arraySimulator['minutes'] = $request->minutes;

            $this->simulator->create($arraySimulator);
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
        return response()->json($this->simulator->show($id))
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
        return response()->json($this->simulator->show($id))
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
                    'minutes' => $request->minutes
                ),
                array(
                    'minutes' => 'required'
                ),
                array(
                    'minutes' => 'Favor informar o minuto!'
                )
            );

            if($validator->fails()){
                $msg = $validator->messages()->getMessages();
                return response()->json(['success' => false, 'message' => $msg])
                    ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
            }

            $arraySimulator = array();
            $arraySimulator['minutes'] = $request->minutes;

            if (!$this->simulator->update($arraySimulator, $id)) {
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
            $this->simulator->delete($id);
            return response()->json(['success' => true, 'message' => "Cadastro removido com sucesso!"])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()])
                ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
        }
    }
}
