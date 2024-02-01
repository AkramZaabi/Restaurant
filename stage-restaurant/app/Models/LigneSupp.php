<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneSupp extends Model
{
    use HasFactory;

    public function LignePlat()
    {
        return  $this->belongsTo(LignePlat::class);
    }
}
