<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    public $table = "livros";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'autor_id', 'catagoria_id', 'editora_id', 'isbn', 'title', 'subtitulo', 'descricao', 'ano', 'num_pag'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'deleted_at', 'created_at', 'update_at'
    ];
}

