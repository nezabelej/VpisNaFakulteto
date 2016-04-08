<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisokosolskiZavod extends Model
{
    protected $table = 'visokosolski_zavod';
    protected $fillable = ['ime', 'kratica', 'id_obcine', 'id_skrbnika'];
    protected $guarded = ['id'];
}