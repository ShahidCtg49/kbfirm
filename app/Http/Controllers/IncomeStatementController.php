<?php

namespace App\Http\Controllers;

use App\Models\GeneralLedger;
use App\Models\MasterAccount;
use Illuminate\Http\Request;
use DB;

class IncomeStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('incomeStatement.index');
    }

    public function details(Request $r){
        $month=$r->month;
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

        if($month){
            $datas=$year."-".$month."-01";
            $datae=$year."-".$month."-31";
        }else{
            $datas=$year."-01-01";
            $datae=$year."-12-31";
        }
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
        
        $data='<div class="col-lg-12 stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Income Statement</h4>
                    </p>
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th> Particulars </th>
                        <th> Amount </th>
                        </tr>
                    </thead>
                    <tbody>';
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
                            $data.='<tr class="table-info">';
                            $data.='<td>'.$i++.'</td>';
                            $data.='<td> '.$opi->journal_title.' </td>';
                            $data.='<td class="text-right"> '.$opi->cr.' </td>';
                            $data.='</tr>';
                        }
                    }
                    $data.='<tr>
                            <th> </th>
                            <th class="text-right"> Gross Operating Income </th>
                            <th class="text-right"> '.$opinc.' </th>
                            </tr>';
                    /* operating Expense */
                    if($opexpense){
                        foreach($opexpense as $opi){
                            $opexp+=$opi->dr;
                            $data.='<tr class="table-info">';
                            $data.='<td>'.$i++.'</td>';
                            $data.='<td> '.$opi->journal_title.' </td>';
                            $data.='<td class="text-right"> '.$opi->dr.' </td>';
                            $data.='</tr>';
                        }
                    }
                    $data.='<tr>
                            <th> </th>
                            <th class="text-right"> Total Operating Expense </th>
                            <th class="text-right"> '.$opexp.' </th>
                            </tr>';
                    $data.='<tr>
                            <th> </th>
                            <th class="text-right"> Net Operating Income </th>
                            <th class="text-right"> '.($opinc - $opexp).' </th>
                            </tr>';
                    /* nonoperating income */
                    if($nonopincome){
                        foreach($nonopincome as $opi){
                            $nonopinc+=$opi->cr;
                            $data.='<tr class="table-info">';
                            $data.='<td>'.$i++.'</td>';
                            $data.='<td> '.$opi->journal_title.' </td>';
                            $data.='<td class="text-right"> '.$opi->cr.' </td>';
                            $data.='</tr>';
                            
                        }
                    }
                    $data.='<tr>
                            <th> </th>
                            <th class="text-right"> Gross Nonoperating Income Total </th>
                            <th class="text-right"> '.$nonopinc.' </th>
                            </tr>';
                    
                    
                    /* nonoperating Expense */
                    if($nonopexpense){
                        foreach($nonopexpense as $opi){
                            $nonopexp+=$opi->dr;
                            $data.='<tr class="table-info">';
                            $data.='<td>'.$i++.'</td>';
                            $data.='<td> '.$opi->journal_title.' </td>';
                            $data.='<td class="text-right"> '.$opi->dr.' </td>';
                            $data.='</tr>';
                            
                        }
                    }
                    $data.='<tr>
                            <th> </th>
                            <th class="text-right"> Total Nonoperating Expense </th>
                            <th class="text-right"> '.$nonopexp.' </th>
                            </tr>';
                    $data.='<tr>
                            <th> </th>
                            <th class="text-right"> Net Nonoperating Income </th>
                            <th class="text-right"> '.($nonopinc - $nonopexp).' </th>
                            </tr>';
                    $data.='<tr>
                            <th> </th>
                            <th class="text-right"> Net Income Before Tax</th>
                            <th class="text-right"> '.(($nonopinc + $opinc)  - ($opexp + $nonopexp)).' </th>
                            </tr>';
                    if($taxamount){
                        foreach($taxamount as $t){
                            $tax+=$t->dr;
                            $data.='<tr class="table-info">';
                            $data.='<td>'.$i++.'</td>';
                            $data.='<td> '.$t->journal_title.' </td>';
                            $data.='<td class="text-right"> '.$t->dr.' </td>';
                            $data.='</tr>';
                            
                        }
                    }
                    $data.='<tr>
                            <th> </th>
                            <th class="text-right"> Net Income</th>
                            <th class="text-right"> '.(($nonopinc + $opinc)  - ($opexp + $nonopexp + $tax)).' </th>
                            </tr>';

            $data.='</tbody>
                </table>
            </div>
            </div>
        </div>';
        echo  json_encode($data);
        //print_r($r->year);
    }

}
