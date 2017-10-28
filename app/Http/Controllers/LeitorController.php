<?php

namespace App\Http\Controllers;

use App\Leitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LeitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leitor = Leitor::all();
        return response()->json($leitor);
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

            $leitor = new Leitor();
            $leitor->nome = $input['nome'];
            $leitor->notacao = $input['notacao'];
            $leitor->save();

            return response()->json(['success' => true, 'message' => 'Leitor gravado com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => true, 'message' => 'Falha ao gravar leitor!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leitor  $leitor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leitor = Leitor::find($id);
        return response()->json($leitor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leitor  $leitor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leitor = Leitor::find($id);
        return response()->json($leitor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leitor  $leitor
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

            $leitor = Leitor::find($id);
            $leitor->nome = $input['nome'];
            $leitor->notacao = $input['notacao'];
            $leitor->update();

            return response()->json(['success' => true, 'message' => 'Leitor cadastrado com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao realizar o cadastro!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leitor  $leitor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $leitor = Leitor::find($id);
            $leitor->history()->restore();

            return response()->json(['success' => true, 'message' => 'Leitor removido com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao remover cadastro!']);
        }
    }
}
