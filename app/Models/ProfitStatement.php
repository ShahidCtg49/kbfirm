<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfitStatement extends Model
{
    use HasFactory;
    public function investor(){
        return $this->belongsTo(InvestorInformation::class);
    }
}
