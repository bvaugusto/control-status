<?php

namespace App\Http\Controllers;

use App\Status;
use App\Repositories\StatusRepositoryEloquent;
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
            return response()->json($arrayStatus);
            // return response()->json($this->status->all());
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
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
            return response()->json(['success' => false, 'message' => $msg]);
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
        return response()->json($this->status->show($id));
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
        return response()->json($this->status->show($id));
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
                return response()->json(['success' => false, 'message' => $msg]);
            }

            if (!$this->status->update($request, $id)) {
                return response()->json(['success' => false, 'message' => "Falha ao atualizar o cadastro!"]);
            }

            return response()->json(['success' => true, 'message' => "Cadastro atualizado com sucesso!"]);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
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
            return response()->json(['success' => true, 'message' => "Cadastro removido com sucesso!"]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
