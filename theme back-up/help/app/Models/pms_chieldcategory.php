<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pms_chieldcategory extends Model
{
    use HasFactory;
    public function cat_name(){
        return $this->belongsTo('App\Models\pms_category','category_id','id');
    }
    public function subcat_name(){
        return $this->belongsTo('App\Models\pms_subcategory','subcategory_id','id');
    }
}
