<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Livraison()
    {
        return  $this->hasMany(Livraison::class);
    }
    public function Supplements()
    {
        return  $this->belongsToMany(Supplement::class,'plat_supps');
    }

    public function LignePlat()
    {
        return  $this->hasMany(LignePlat::class);
    }
    public function Favoris()
    {   
        return  $this->hasMany(Favoris::class);
    }

}
