<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pms_item extends Model
{
    use HasFactory;
    public function cat_name(){
        return $this->belongsTo('App\Models\pms_category','pms_categori_id','id');
    }
    public function subcat_name(){
        return $this->belongsTo('App\Models\pms_subcategory','pms_subcategori_id','id');
    }
    public function chieldcat_name(){
        return $this->belongsTo('App\Models\pms_chieldcategory','pms_chieldcategori_id','id');
    }
    public function brand_name(){
        return $this->belongsTo('App\Models\pms_brand','pms_brand_id','id');
    }
    public function manufac_name(){
        return $this->belongsTo('App\Models\Pms_manufac','pms_manufac_id','id');
    }
    public function unit_name(){
        return $this->belongsTo('App\Models\Pms_unit','pms_unit_id','id');
    }
    public function tax_name(){
        return $this->belongsTo('App\Models\Tax','tax_id','id');
    }
   
}
