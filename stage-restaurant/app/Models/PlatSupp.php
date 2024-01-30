<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatSupp extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function Plat()
    {
        return  $this->belongsTo(Plat::class);
    }
    public function  Supplement()
    {
        return  $this->belongsTo(Supplement::class);
    }

}
