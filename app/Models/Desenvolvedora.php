<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedora extends Model
{
    protected $table = 'desenvolvedoras';
    protected $fillable = ['nome', 'pais', 'ano_fundacao'];
}
