<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestorInformation;
use App\Models\GeneralLedger;
use App\Models\MasterAccount;

class ProfitPortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profitPortfolio.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function details(Request $r){
        $year=$r->year;
        $acc_head=MasterAccount::all();
        /* operating income */
        $incomeheadop=array();
        $incomeheadopone=array();
        $incomeheadoptwo=array();
        /* nonoperating income */
        $incomeheadnop=array();
        $incomeheadnopone=array();
        $incomeheadnoptwo=array();

        /* operating expense */
        $expenseheadop=array();
        $expenseheadopone=array();
        $expenseheadoptwo=array();
        /* nonoperating expense */
        $expenseheadnop=array();
        $expenseheadnopone=array();
        $expenseheadnoptwo=array();
        $tax_data=array();

        foreach($acc_head as $ah){
            if($ah->head_code=="4000"){
                if($ah->subhead){
                    foreach($ah->subhead as $subhead){
                        if($subhead->head_code=="4100"){/* operating income */
                            if($subhead->childOne->count() > 0){
                                foreach($subhead->childOne as $childOne){
                                    if($childOne->childTwo->count() > 0){
                                        foreach($childOne->childTwo as $childTwo){
                                            $incomeheadoptwo[]=$childTwo->id;
                                        }
                                    }else{
                                        $incomeheadopone[]=$childOne->id;
                                    }
                                }
                            }else{
                                $incomeheadop[]=$subhead->id;
                            }
                        }else if ($subhead->head_code=="4200"){ /* nonoperating income */
                            if($subhead->childOne->count() > 0){
                                foreach($subhead->childOne as $childOne){
                                    if($childOne->childTwo->count() > 0){
                                        foreach($childOne->childTwo as $childTwo){
                                            $incomeheadnoptwo[]=$childTwo->id;
                                        }
                                    }else{
                                        $incomeheadnopone[]=$childOne->id;
                                    }
                                }
                            }else{
                                $incomeheadnop[]=$subhead->id;
                            }
                        }
                    }
                }
            }else if($ah->head_code=="5000"){
                if($ah->subhead){
                    foreach($ah->subhead as $subhead){
                        if($subhead->head_code=="5200"){/* operating income */
                            if($subhead->childOne->count() > 0){
                                foreach($subhead->childOne as $childOne){
                                    if($childOne->childTwo->count() > 0){
                                        foreach($childOne->childTwo as $childTwo){
                                            $expenseheadoptwo[]=$childTwo->id;
                                        }
                                    }else{
                                        $expenseheadopone[]=$childOne->id;
                                    }
                                }
                            }else{
                                $expenseheadop[]=$subhead->id;
                            }
                        }else if ($subhead->head_code=="5300"){ /* nonoperating income */
                            if($subhead->childOne->count() > 0){
                                foreach($subhead->childOne as $childOne){
                                    if($childOne->childTwo->count() > 0){
                                        foreach($childOne->childTwo as $childTwo){
                                            $expenseheadnoptwo[]=$childTwo->id;
                                        }
                                    }else{
                                        if($childOne->head_code!="53001")
                                            $expenseheadnopone[]=$childOne->id;
                                        else
                                            $tax_data[]=$childOne->id;
                                    }
                                }
                            }else{
                                $expenseheadnop[]=$subhead->id;
                            }
                        }
                    }
                }
            }
        }

        
            $datas=$year."-01-01";
            $datae=$year."-12-31";
            //\DB::connection()->enableQueryLog();
            /* operating income */
            $opincome=GeneralLedger::whereBetween('rec_date',[$datas,$datae])
            ->where(function($query) use ($incomeheadop,$incomeheadopone,$incomeheadoptwo){
                $query->orWhere(function($query) use ($incomeheadop){
                     $query->whereIn('sub_head_id',$incomeheadop);
                });
                $query->orWhere(function($query) use ($incomeheadopone){
                     $query->whereIn('child_one_id',$incomeheadopone);
                });
                $query->orWhere(function($query) use ($incomeheadoptwo){
                     $query->whereIn('child_two_id',$incomeheadoptwo);
                });
            })
            ->get();

            //$queries = \DB::getQueryLog();
            //dd($queries);
            /* nonoperating income */
            $nonopincome=GeneralLedger::whereBetween('rec_date',[$datas,$datae])
            ->where(function($query) use ($incomeheadnop,$incomeheadnopone,$incomeheadnoptwo){
                $query->orWhere(function($query) use ($incomeheadnop){
                     $query->whereIn('sub_head_id',$incomeheadnop);
                });
                $query->orWhere(function($query) use ($incomeheadnopone){
                     $query->whereIn('child_one_id',$incomeheadnopone);
                });
                $query->orWhere(function($query) use ($incomeheadnoptwo){
                     $query->whereIn('child_two_id',$incomeheadnoptwo);
                });
            })
            ->get();

            /* operating expense */
            $opexpense=GeneralLedger::whereBetween('rec_date',[$datas,$datae])
            ->where(function($query) use ($expenseheadop,$expenseheadopone,$expenseheadoptwo){
                $query->orWhere(function($query) use ($expenseheadop){
                     $query->whereIn('sub_head_id',$expenseheadop);
                });
                $query->orWhere(function($query) use ($expenseheadopone){
                     $query->whereIn('child_one_id',$expenseheadopone);
                });
                $query->orWhere(function($query) use ($expenseheadoptwo){
                     $query->whereIn('child_two_id',$expenseheadoptwo);
                });
            })
            ->get();

            /* nonoperating expense */
            $nonopexpense=GeneralLedger::whereBetween('rec_date',[$datas,$datae])
            ->where(function($query) use ($expenseheadnop,$expenseheadnopone,$expenseheadnoptwo){
                $query->orWhere(function($query) use ($expenseheadnop){
                     $query->whereIn('sub_head_id',$expenseheadnop);
                });
                $query->orWhere(function($query) use ($expenseheadnopone){
                     $query->whereIn('child_one_id',$expenseheadnopone);
                });
                $query->orWhere(function($query) use ($expenseheadnoptwo){
                     $query->whereIn('child_two_id',$expenseheadnoptwo);
                });
            })
            ->get();
            /* nonoperating expense */
            $taxamount=GeneralLedger::whereBetween('rec_date',[$datas,$datae])
            ->where(function($query) use ($tax_data){
                $query->orWhere(function($query) use ($tax_data){
                     $query->whereIn('child_one_id',$tax_data);
                });
            })
            ->get();
       
                    $i=1;
                    $opinc=0;
                    $nonopinc=0;
                    $opexp=0;
                    $nonopexp=0;
                    $tax=0;
                    /* operating income */
                    if($opincome){
                        foreach($opincome as $opi){
                            $opinc+=$opi->cr;
                        }
                    }
                   
                    /* operating Expense */
                    if($opexpense){
                        foreach($opexpense as $opi){
                            $opexp+=$opi->dr;
                        }
                    }
                    
                    /* nonoperating income */
                    if($nonopincome){
                        foreach($nonopincome as $opi){
                            $nonopinc+=$opi->cr;
                        }
                    }
                    /* nonoperating Expense */
                    if($nonopexpense){
                        foreach($nonopexpense as $opi){
                            $nonopexp+=$opi->dr;
                        }
                    }
                    if($taxamount){
                        foreach($taxamount as $t){
                            $tax+=$t->dr;
                        }
                    }
                   
                    $income=(($nonopinc + $opinc)  - ($opexp + $nonopexp + $tax));

        $director_profit=$r->director_profit;
        $date_of_dec=$r->date_of_dec;
        $num_director=InvestorInformation::where('status',1)->where('type',0)->count();
        $num_shares=InvestorInformation::where('status',1)->sum('number_shares');
        $investor=InvestorInformation::where('status',1)->get();
        if($investor){
            $data=view('profitPortfolio.profit', compact('date_of_dec','income','num_director','num_shares','investor','director_profit'))->render();
        }else{
            $data="No investor found";
        }
        echo  json_encode($data);
        //print_r($r->year);
    }
}
