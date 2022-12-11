<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    public function company_name(){
        return $this->belongsTo('App\Models\Company','company_id','id');
    }
}
