<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LignePlat extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function  Livraison()
    {
        return  $this->belongsTo(Livraison::class);
    }
    public function Plat()
    {
        return $this->belongsTo(Plat::class);
    }
    public function LigneSupp()
    {
        return  $this->hasMany(LigneSupp::class);
    }
}
