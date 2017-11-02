<?php

namespace App\Http\Controllers;

use App\Emprestimo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class EmprestimoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emprestimo = Emprestimo::all();
        return response()->json($emprestimo);
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

            $emprestimo = new Emprestimo();
            $emprestimo->nome = $input['nome'];
            $emprestimo->notacao = $input['notacao'];
            $emprestimo->save();

            return response()->json(['success' => true, 'message' => 'Emprestimo realizado com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => true, 'message' => 'Falha ao cadastar emprestimo!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emprestimo = Emprestimo::find($id);
        return response()->json($emprestimo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emprestimo = Emprestimo::find($id);
        return response()->json($emprestimo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emprestimo  $emprestimo
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

            $emprestimo = Emprestimo::find($id);
            $emprestimo->nome = $input['nome'];
            $emprestimo->notacao = $input['notacao'];
            $emprestimo->update();

            return response()->json(['success' => true, 'message' => 'Emprestimo alterado com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao alterar o empréstimo!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emprestimo  $emprestimo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $emprestimo = Emprestimo::find($id);
            $emprestimo->history()->restore();

            return response()->json(['success' => true, 'message' => 'Emprestimo removido com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao remover cadastro!']);
        }
    }
}
