<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autor = Autor::all();
        return response()->json($autor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("create");
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

            $autor = new Autor();
            $autor->nome = $input['nome'];
            $autor->notacao = $input['notacao'];
            $autor->save();

            return response()->json(['success' => true, 'message' => 'Autor cadastradp com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao cadastrar autor!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autor = Autor::find($id);
        return response()->json($autor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autor = Autor::find($id);
        return response()->json($autor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //http://sistemabibliotecarioapi.dev/api/autor/1
        //http://www.sistemabibliotecario.dev/api/autor/1

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

            $autor = Autor::find($id);
            $autor->nome = $input['nome'];
            $autor->notacao = $input['notacao'];
            $autor->update();

            return response()->json(['success' => true, 'message' => 'Autor atuallizado com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao atualizar cadastro!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = null)
    {
        try{

            $autor = Autor::destroy($id);
//            $autor->history()->delete();

            return response()->json(['success' => true, 'message' => 'Autor removido com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao remover cadastro!']);
        }
    }
}
