<?php

namespace App\Http\Controllers;

use App\Livro;
use App\Http\Requests;

use DateTime;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livro = Livro::select( 'livros.id', 'livros.isbn', 'livros.title', 'livros.subtitulo', 'autores.nome as autor_nome',
            'categorias.nome as categoria_nome', 'editoras.nome as editora_nome')
            ->join('autores', 'livros.autor_id', '=', 'autores.id')
            ->join('categorias', 'livros.catagoria_id', '=', 'categorias.id')
            ->join('editoras', 'livros.editora_id', '=', 'editoras.id')
            ->get();
        return response()->json($livro);
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
    public function store()
    {
        $validator = Validator::make(
            array(
                'autor_id' => Input::get('autor'),
                'catagoria_id' => Input::get('categoria'),
                'editora_id' => Input::get('editora')
            ),
            array(
                'autor_id' => 'required',
                'catagoria_id' => 'required',
                'editora_id' => 'required'
            ),
            array(
                'autor_id' => 'Favor informar o autor!',
                'catagoria_id' => 'Favor informar a categoria!',
                'editora_id' => 'Favor informar a editora!'
            )
        );

        //return $validator->messages()->getMessages();
        if ($validator->fails())
            return response()->json(['success' => false, 'message' => $validator->messages()->getMessages()]);

        try{
            
            $livro = new Livro();

            $livro->autor_id = Input::get('autor');
            $livro->catagoria_id = Input::get('categoria');
            $livro->editora_id = Input::get('editora');
            $livro->isbn = Input::get('isbn');
            $livro->title = Input::get('title');
            $livro->subtitulo = Input::get('subtitulo');
            $livro->descricao = Input::get('descricao');
//            $livro->ano = DateTime::createFromFormat('d-m-Y', Input::get('ano'));
            $livro->ano = Input::get('ano');
            $livro->num_pag = Input::get('num_pag');

            $livro->save();

            return response()->json(['success' => true, 'message' => 'Livro cadastrado com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => true, 'message' => 'Falha ao cadastrar livro!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livro = Livro::find($id);
        return response()->json($livro);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livro = Livro::find($id);
        return response()->json($livro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Input::all();
        $validator = Validator::make(
            array(
                'autor_id' => Input::get('autor'),
                'catagoria_id' => Input::get('categoria'),
                'editora_id' => Input::get('editora')
            ),
            array(
                'autor_id' => 'required',
                'catagoria_id' => 'required',
                'editora_id' => 'required'
            ),
            array(
                'autor_id' => 'Favor informar o autor!',
                'catagoria_id' => 'Favor informar a categoria!',
                'editora_id' => 'Favor informar a editora!'
            )
        );

        if ($validator->fails())
            return $validator->messages()->getMessages();

        try{

            $livro = Livro::find($id);
            $livro->autor_id = Input::get('autor');
            $livro->catagoria_id = Input::get('categoria');
            $livro->editora_id = Input::get('editora');
            $livro->isbn = Input::get('isbn');
            $livro->title = Input::get('title');
            $livro->subtitulo = Input::get('subtitulo');
            $livro->descricao = Input::get('descricao');
            $livro->ano = Input::get('ano');
            $livro->num_pag = Input::get('num_pag');
            $livro->update();

            return response()->json(['success' => true, 'message' => 'Livro alterado com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao alterar cadastro!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            Livro::destroy($id);
            return response()->json(['success' => true, 'message' => 'Livro removido com sucesso!']);

        }catch (\Exception $exception){
            return response()->json(['success' => false, 'message' => 'Falha ao remover cadastro!']);
        }
    }
}
