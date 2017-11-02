<?php

namespace App\Http\Controllers;

use App\Exemplar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ExemplarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exemplar = Exemplar::all();
        return response()->json($exemplar);
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

            $exemplar = new Exemplar();
            $exemplar->nome = $input['nome'];
            $exemplar->notacao = $input['notacao'];
            $exemplar->save();

            return response()->json(['success' => true, 'message' => 'Exemplar cadastrado com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => true, 'message' => 'Falha ao cadastrar exemplar!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exemplar  $exemplar
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exemplar = Exemplar::find($id);
        return response()->json($exemplar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exemplar  $exemplar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exemplar = Exemplar::find($id);
        return response()->json($exemplar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exemplar  $exemplar
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

            $exemplar = Exemplar::find($id);
            $exemplar->nome = $input['nome'];
            $exemplar->notacao = $input['notacao'];
            $exemplar->update();

            return response()->json(['success' => true, 'message' => 'Exemplar alterado com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao alterar o cadastro!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exemplar  $exemplar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $exemplar = Exemplar::find($id);
            $exemplar->history()->restore();

            return response()->json(['success' => true, 'message' => 'Exemplar removido com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao remover cadastro!']);
        }
    }
}
