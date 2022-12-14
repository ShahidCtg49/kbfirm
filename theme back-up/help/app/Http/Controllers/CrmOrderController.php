<?php

namespace App\Http\Controllers;

use App\Models\CrmOrder;
use App\Models\CrmOrderDetail;
use App\Models\Customer;
use App\Models\Service;
use App\Models\Hrm_employeebasic;
use Illuminate\Http\Request;
use App\Http\Requests\Order\AddNewRequest;

use App\Models\Generalledger;
use App\Models\Generalvoucher;
use App\Models\Journalvoucher;
use App\Models\Journalvoucherbkdn;

use App\Http\Traits\ResponseTrait;
use Exception;
use DB;

class CrmOrderController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=CrmOrder::paginate(10);
		return view('crm.order.index',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer=Customer::get();
        $employee=Hrm_employeebasic::get();
        $service=Service::get();
        return view('crm.order.create',compact('customer','employee','service'));
    }
    /**
     * Voucher no create
     */
    public function create_voucher_no(){
		$voucher_no="";
		$query = Generalvoucher::where('company_id',company())->latest()->first();
		if(!empty($query)){
		    $voucher_no = $query->voucher_no;
			$voucher_no+=1;
			$gv=new Generalvoucher;
			$gv->voucher_no=$voucher_no;
			$gv->company_id=company();
			if($gv->save())
				return $voucher_no;
			else
				return $voucher_no="";
		}else {
			$voucher_no=10000001;
			$gv=new Generalvoucher;
			$gv->voucher_no=$voucher_no;
			$gv->company_id=company();
			if($gv->save())
				return $voucher_no;
			else
				return $voucher_no="";
		}
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $r)
    {
        try{
            DB::beginTransaction();
            
            $customer=explode('~',$r->customer_id);
            $order=new CrmOrder;
            $order->customer_id=$customer['0'];
            $order->proposul_no=$r->proposul_no;
            $order->proposul_dt=$r->proposul_dt;
            $order->wo_no=$r->wo_no;
            $order->wo_dt=$r->wo_dt;
            $order->due_date=$r->due_date;
            $order->short_des=$r->short_des;
            $order->details_des=$r->details_des;
            $order->represent_by=$r->represent_by;
            $order->reference=$r->reference;
            $order->status=$r->status;
            $order->start_date=$r->start_date;
            $order->delivery_date=$r->delivery_date;
            $order->order_note=$r->order_note;
            $order->sub_total=$r->sub_total;
            $order->total_discount=$r->total_discount;
            $order->total_tax=$r->total_tax;
            $order->grand_total=$r->grand_total;
			
            if(!!$order->save()){
                $order_id=$order->id;
                if($r->service){
                    foreach($r->service as $services){
                        
                        if(isset($services['discount_type']))
                            $distype=$services['discount_type'];
                        else
                            $distype=0;
                            
                        $ordetails=new CrmOrderDetail;
                        $ordetails->order_id=$order_id;
                        $ordetails->service_id=$services['service_name'];
                        $ordetails->description=$services['description'];
                        $ordetails->price=$services['price'];
                        $ordetails->discount_type=$distype;
                        $ordetails->discount=$services['discount_amount'];
                        $ordetails->tax=$services['tax'];
                        $ordetails->amount=$services['amount'];
                        $ordetails->save();
                    }
                }
                
                $voucher_no = $this->create_voucher_no();
                if(!empty($voucher_no)){
                    $jv=new Journalvoucher;
                    $jv->voucher_no=$voucher_no;
                    $jv->v_date=$r->wo_dt;
                    $jv->particular="Sales";
                    $jv->credit_sum=$r->grand_total;
                    $jv->debit_sum=$r->grand_total;
                    $jv->cheque_no="";
                    $jv->bank_name="";
                    $jv->cheque_date="";
                    $jv->created_by=currentUserId();
                    $jv->company_id=company();
                    if($jv->save()){
                        
                        $debit=explode('~',"chieldheadones~3~Account Receivable-1020");
                        $jvb=new Journalvoucherbkdn;
                        $jvb->journalvoucher_id=$jv->id;
                        $jvb->remarks="Sales to ".$customer['1']."-".$customer['2'];
                        $jvb->account_code=$debit[2];
                        $jvb->table_name=$debit[0];
                        $jvb->table_id=$debit[1];
                        $jvb->debit=$r->grand_total;
                        if($jvb->save()){
                            $table_name=$debit[0];
                            if($table_name=="masterheads"){$field_name="masterhead_id";}
    						else if($table_name=="subheads"){$field_name="subhead_id";}
    						else if($table_name=="chieldheadones"){$field_name="chieldheadone_id";}
    						else if($table_name=="chieldheadtwos"){$field_name="chieldheadtwo_id";}
    						$gl=new Generalledger;
                            $gl->journalvoucher_id=$jv->id;
                            $gl->journal_title="Sales to Customer";
                            $gl->v_date=$r->wo_dt;
                            $gl->jv_id=$voucher_no;
                            $gl->journalvoucherbkdn_id=$jvb->id;
                            $gl->created_by=currentUserId();
                            $gl->company_id=company();
                            $gl->dr=$r->grand_total;
                            $gl->{$field_name}=$debit[1];
                            $gl->save();
                        }
                        
                        $credit=explode('~',"chieldheadones~8~Sales-4101");
                        $cjvb=new Journalvoucherbkdn;
                        $cjvb->journalvoucher_id=$jv->id;
                        $cjvb->remarks="Sales from order ";
                        $cjvb->account_code=$credit[2];
                        $cjvb->table_name=$credit[0];
                        $cjvb->table_id=$credit[1];
                        $cjvb->credit=$r->grand_total;
                        if($cjvb->save()){
                            $table_name=$credit[0];
                            if($table_name=="masterheads"){$field_name="masterhead_id";}
    						else if($table_name=="subheads"){$field_name="subhead_id";}
    						else if($table_name=="chieldheadones"){$field_name="chieldheadone_id";}
    						else if($table_name=="chieldheadtwos"){$field_name="chieldheadtwo_id";}
    						$gl=new Generalledger;
                            $gl->journalvoucher_id=$jv->id;
                            $gl->journal_title="Sales to Customer";
                            $gl->v_date=$r->wo_dt;
                            $gl->jv_id=$voucher_no;
                            $gl->journalvoucherbkdn_id=$cjvb->id;
                            $gl->created_by=currentUserId();
                            $gl->company_id=company();
                            $gl->cr=$r->grand_total;
                            $gl->{$field_name}=$credit[1];
                            $gl->save();
                        }
                    }
                }
                
                /* update order jv id */
                $order->jv_id=$voucher_no;
                $order->save();
                /* /update order jv id */
                
                DB::commit();
                return redirect(route('clients.show',$customer['0'])."#order_click")->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
			DB::rollBack();
            return redirect()->back()->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrmOrder  $crmOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=CrmOrder::find($id);
        return view('crm.order.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrmOrder  $crmOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=CrmOrder::find($id);
        $customer=Customer::get();
        $employee=Hrm_employeebasic::get();
        return view('crm.order.edit',compact('customer','employee','order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrmOrder  $crmOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        try{
            $order=CrmOrder::find($id);
            $order->customer_id=$r->customer_id;
            $order->proposul_no=$r->proposul_no;
            $order->proposul_dt=$r->proposul_dt;
            $order->wo_no=$r->wo_no;
            $order->wo_dt=$r->wo_dt;
            $order->due_date=$r->due_date;
            $order->short_des=$r->short_des;
            $order->details_des=$r->details_des;
            $order->represent_by=$r->represent_by;
            $order->reference=$r->reference;
            $order->order_value=$r->order_value;
            $order->status=$r->status;
            $order->order_note=$r->order_note;
            $order->updated_by=currentUserId();
			
            if(!!$order->save()){
                return redirect(route('clients.show',$r->customer_id)."#order_click")->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			//dd($e);
            return redirect()->back()->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrmOrder  $crmOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(CrmOrder $crmOrder)
    {
        //
    }
}
