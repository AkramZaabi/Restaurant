<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifaction extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function Users()
    {
        return $this->belongsTo(User::class);
    }
}
