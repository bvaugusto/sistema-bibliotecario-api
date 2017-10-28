<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leitor extends Model
{
    public $table = "leitores";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','status_id','nome','sobrenome','email','endereco','telefone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_at', 'created_at', 'update_at', 'user_id'
    ];
}
