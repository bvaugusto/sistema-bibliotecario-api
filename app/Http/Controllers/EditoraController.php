<?php

namespace App\Http\Controllers;

use App\Editora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class EditoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editora = Editora::all();
        return response()->json($editora);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = Input::all();

        $validator = Validator::make(
            array(
                'nome' => $input['nome']
            ),
            array(
                'nome' => 'required|max:100'
            ),
            array(
                'nome' => 'Favor informar o nome!'
            )
        );

        if ($validator->fails())
            return $validator->messages()->getMessages();

        try{

            $editora = new Editora();
            $editora->nome = $input['nome'];
            $editora->save();

            return response()->json(['success' => true, 'message' => 'Editora cadastrada com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao cadastrar editora!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $editora = Editora::find($id);
        return response()->json($editora);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editora = Editora::find($id);
        return response()->json($editora);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Input::all();
        $validator = Validator::make(
            array(
                'nome' => $input['nome']
            ),
            array(
                'nome' => 'required|max:100'
            ),
            array(
                'nome' => 'Favor informar o nome!'
            )
        );

        if ($validator->fails())
            return $validator->messages()->getMessages();

        try{

            $editora = Editora::find($id);
            $editora->nome = $input['nome'];
            $editora->update();

            return response()->json(['success' => true, 'message' => 'Editora atualizada com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao atualizar editora!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Editora  $editora
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            Editora::destroy($id);
            return response()->json(['success' => true, 'message' => 'Editora removida com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao remover editora!']);
        }
    }
}
