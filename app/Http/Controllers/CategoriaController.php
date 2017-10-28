<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria = Categoria::all();
        return response()->json($categoria);
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

            $categoria = new Categoria();
            $categoria->nome = $input['nome'];
            $categoria->save();

            return response()->json(['success' => true, 'message' => 'Categoria cadastrada com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao cadastrar categoria!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        return response()->json($categoria);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return response()->json($categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
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

            $categoria = Categoria::find($id);
            $categoria->nome = $input['nome'];
            $categoria->update();

            return response()->json(['success' => true, 'message' => 'Categoria alterada com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao alterar categoria!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Categoria::destroy($id);
            return response()->json(['success' => true, 'message' => 'Categoria removido com sucesso!']);
        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao remover cadastro!']);
        }
    }
}
