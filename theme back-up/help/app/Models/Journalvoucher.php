<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journalvoucher extends Model
{
    use HasFactory;
    
    public function voucherbkdn(){
        return $this->hasMany('App\Models\Journalvoucherbkdn','journalvoucher_id','id');
    }
}
