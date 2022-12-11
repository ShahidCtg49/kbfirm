<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrmOrder extends Model
{
    use HasFactory;
    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id','id');
    }
    public function employee(){
        return $this->belongsTo('App\Models\Hrm_employeebasic','represent_by','id');
    }
    public function order_details(){
        return $this->hasMany('App\Models\CrmOrderDetail','order_id','id');
    }

    public function order_payment(){
        return $this->hasMany('App\Models\CrmRcvdpayment','order_id','id');
    }

}
