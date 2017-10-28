<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    public $table = "autores";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nome'
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
