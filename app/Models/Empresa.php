<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nombre'
    ];

    public function stocks(){
        return $this->hasMany(Stock::class);
    }
    public function stock(){
        return $this->hasOne(Stock::class)->latest('fecha');
    }
}