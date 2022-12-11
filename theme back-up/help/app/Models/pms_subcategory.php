<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pms_subcategory extends Model
{
    use HasFactory;
    public function cat_name(){
        return $this->belongsTo('App\Models\pms_category','category_id','id');
    }
}
