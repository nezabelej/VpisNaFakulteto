<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PrijavaNaslovZaPosiljanje extends Model
{
    protected $table = 'prijava_naslov_za_posiljanje';
    protected $fillable = ['id_kandidata', 'naslov', 'id_drzave', 'id_obcine', 'postna_stevilka', 'veljavno'];
    protected $guarded = ['id'];
    public $timestamps = true;

    public function drzava()
    {
        return $this->belongsTo('App\Models\Drzava', 'id_drzave');
    }

    public function obcina()
    {
        return $this->belongsTo('App\Models\Obcina', 'id_obcine');
    }

    public function posta()
    {
        return $this->belongsTo('App\Models\Posta', 'postna_stevilka');
    }
}