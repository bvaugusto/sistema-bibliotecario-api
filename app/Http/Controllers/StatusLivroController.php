<?php

namespace App\Http\Controllers;

use App\StatusLivroLivro;
use Illuminate\Http\Request;

class StatusLivroLivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusLivro = StatusLivro::all();
        return response()->json($statusLivro);
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
        $validator = Validator::make(
            array(
                'nome' => $request->nome,
                'notacao' => $request->notacao
            ),
            array(
                'nome' => 'required|max:100',
                'notacao' => 'required|max:100'
            ),
            array(
                'nome' => 'Favor informar o nome!',
                'notacao' => 'Favor informar a notação!'
            )
        );

        if ($validator->fails())
            return $validator->messages()->getMessages();

        try{
            $input = Input::all();

            $statusLivro = new StatusLivro();
            $statusLivro->nome = $input['nome'];
            $statusLivro->notacao = $input['notacao'];
            $statusLivro->save();

            return response()->json(['success' => true, 'message' => 'StatusLivro gravado com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => true, 'message' => 'Falha ao gravar statusLivro!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StatusLivro  $statusLivro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statusLivro = StatusLivro::find($id);
        return response()->json($statusLivro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StatusLivro  $statusLivro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statusLivro = StatusLivro::find($id);
        return response()->json($statusLivro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StatusLivro  $statusLivro
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Input::all();

        $validator = Validator::make(
            array(
                'nome' => $input['nome'],
                'notacao' => $input['notacao']
            ),
            array(
                'nome' => 'required|max:100',
                'notacao' => 'required|max:100'
            ),
            array(
                'nome' => 'Favor informar o nome!',
                'notacao' => 'Favor informar a notação!'
            )
        );

        if ($validator->fails())
            return $validator->messages()->getMessages();

        try{

            $statusLivro = StatusLivro::find($id);
            $statusLivro->nome = $input['nome'];
            $statusLivro->notacao = $input['notacao'];
            $statusLivro->update();

            return response()->json(['success' => true, 'message' => 'StatusLivro cadastrado com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao realizar o cadastro!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StatusLivro  $statusLivro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $statusLivro = StatusLivro::find($id);
            $statusLivro->history()->restore();

            return response()->json(['success' => true, 'message' => 'StatusLivro removido com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao remover cadastro!']);
        }
    }
}
