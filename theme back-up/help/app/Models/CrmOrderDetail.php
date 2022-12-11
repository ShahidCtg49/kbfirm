<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmOrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function service(){
        return $this->belongsTo('App\Models\Service','service_id','id');
    }
}
