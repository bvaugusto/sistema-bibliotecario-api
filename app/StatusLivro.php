<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusLivro extends Model
{
    public $table = "status_livro";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'descricao'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at', 'created_at', 'update_at'
    ];
}
