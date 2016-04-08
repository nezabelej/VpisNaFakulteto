<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaturaPredmet extends Model
{
    protected $table = 'matura_predmet';
    protected $fillable = ['emso', 'id_predmeta', 'ocena', 'opravil', 'ocena_3_letnik', 'ocena_4_letnik', 'tip_predmeta'];
}