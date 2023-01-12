<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_empresa',
        'valor',
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
}
