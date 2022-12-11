<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\AddNewRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Models\CrmOrder;
use App\Models\CrmRcvdpayment;

use App\Models\Journalvoucher;
use App\Models\Journalvoucherbkdn;
use App\Models\Generalvoucher;
use App\Models\Generalledger;

use App\Http\Traits\ResponseTrait;
use Exception;
use DB;
use NumberFormatter;

class CustomerController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=Customer::paginate(10);
		return view('crm.clients.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('crm.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $r){
        try{
            $customer=new Customer;
            $customer->name=$r->name;
            $customer->company=$r->company;
            $customer->contact=$r->contact;
            $customer->email=$r->email;
            $customer->address=$r->address;
            $customer->status=$r->status;
            $customer->category=$r->category;
            $customer->reference=$r->reference;
            $customer->note=$r->note;
            $customer->group_company_id=1;
			
            if(!!$customer->save()){
                return redirect(route('clients.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
            return redirect(route('clients.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client=Customer::find($id);
        $order=CrmOrder::where('customer_id',$id)->get();
        $orders=CrmOrder::select('id')->where('customer_id',$id)->get()->toArray();
        
        $payment=CrmRcvdpayment::whereIn('order_id', $orders)->get();
        return view('crm.clients.show',compact('client','order','payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client=Customer::find($id);
        return view('crm.clients.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $r, $id)
    {
        try{
            $customer=Customer::find($id);
            $customer->name=$r->name;
            $customer->company=$r->company;
            $customer->contact=$r->contact;
            $customer->email=$r->email;
            $customer->address=$r->address;
            $customer->status=$r->status;
            $customer->category=$r->category;
            $customer->reference=$r->reference;
            $customer->note=$r->note;
            $customer->group_company_id=1;
			
            if(!!$customer->save()){
                return redirect(route('clients.index'))->with($this->responseMessage(true,null,"Data successfully updated."));
            }
        }catch(Exception $e){
            return redirect()->back()->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    /**
     * Order Payment recieve
    */
    public function rcvdpayment($id){
        $order=CrmOrder::find($id);
        $pay=CrmRcvdpayment::where('order_id',$id)->sum(\DB::raw('amount + adjust_amount'));
       
        $head=\App\Models\Chieldheadone::whereIn('chieldone_code',[1101,1102])->get();
        $headoption="<option value=''>choose one</option>";
        if($head){
            foreach($head as $hd){
                $chhead=\App\Models\Chieldheadtwo::where('chieldheadone_id',$hd->id);
                if($chhead->count() > 0)
                    foreach($chhead->get() as $chgt)
                        $headoption.="<option value='chieldheadtwos~".$chgt->id."~".$chgt->head_name."-".$chgt->chieldtwo_code."'>".$chgt->head_name."</option>";
                else
                    $headoption.="<option value='chieldheadones~".$hd->id."~".$hd->head_name."-".$hd->chieldone_code."'>".$hd->head_name."</option>";
            }
        }
        return view('crm.clients.rcvdpayment',compact('order','headoption','pay'));
    }
    
    /**
     * Order Payment save
     * *`order_id`, `p_terms`, `pdate`, `p_terms_table`, `note`, `amount`, `adjust_amount`, `adjust_note`,
    */

    public function rcvdpayment_save(Request $r){
        try{
            if($r->payments){
                foreach($r->payments as $payment){
                    $ordetails=new CrmRcvdpayment;
                    $ordetails->order_id=$r->order_id;
                    $ordetails->p_terms=explode('~',$payment['p_terms'])[1];
                    $ordetails->pdate=date('Y-m-d');
                    $ordetails->p_terms_table=explode('~',$payment['p_terms'])[0];
                    $ordetails->account_code=explode('~',$payment['p_terms'])[2];
                    $ordetails->note=$payment['note'];
                    $ordetails->adjust_amount=$payment['adjust_amount'];
                    $ordetails->amount=$payment['amount'];
                    if(array_key_exists('has_cheque',$payment)){
                        $ordetails->has_cheque=$payment['has_cheque'][0];
                        $ordetails->cheque_no=$payment['cheque_no'];
                        $ordetails->bank_name=$payment['bank_name'];
                        $ordetails->cheque_date=$payment['cheque_date'];
                    }
                    $ordetails->save();
                }
            }
            return redirect()->back()->with($this->responseMessage(true,null,"Data successfully created."));
            
        }catch(Exception $e){
            return redirect()->back()->with($this->responseMessage(false,"error","Please try again!"));
        }
    }
    
    /**
     * Order Payment recieve pending
    */
    public function rcvdpayment_pending(){
        $pay=CrmRcvdpayment::where('status',0)->get();
        return view('crm.clients.rcvdpayment_pending',compact('pay'));
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
     * payment voucher
     *
     */
    public function payment_journal($id)
    {
        try{
            DB::beginTransaction();
            
            $pay=CrmRcvdpayment::findOrFail($id);
            $voucher_no = $this->create_voucher_no();
            
            if(!empty($voucher_no)){
                $jv=new Journalvoucher;
                $jv->voucher_no=$voucher_no;
                $jv->v_date=date('Y-m-d');
                $jv->particular="Sales Payment";
                $jv->credit_sum=($pay->amount + $pay->adjust_amount);
                $jv->debit_sum=($pay->amount + $pay->adjust_amount);
                $jv->cheque_no=$pay->cheque_no;
                $jv->bank_name=$pay->bank_name;
                $jv->cheque_date=$pay->cheque_date;
                $jv->created_by=currentUserId();
                $jv->company_id=company();
                if($jv->save()){
                    
                    $jvb=new Journalvoucherbkdn;
                    $jvb->journalvoucher_id=$jv->id;
                    $jvb->remarks="Sales Payment";
                    $jvb->account_code=$pay->account_code;
                    $jvb->table_name=$pay->p_terms_table;
                    $jvb->table_id=$pay->p_terms;
                    $jvb->debit=($pay->amount - $pay->adjust_amount);
                    if($jvb->save()){
                        $table_name=$pay->p_terms_table;
                        if($table_name=="masterheads"){$field_name="masterhead_id";}
						else if($table_name=="subheads"){$field_name="subhead_id";}
						else if($table_name=="chieldheadones"){$field_name="chieldheadone_id";}
						else if($table_name=="chieldheadtwos"){$field_name="chieldheadtwo_id";}
						$gl=new Generalledger;
                        $gl->journalvoucher_id=$jv->id;
                        $gl->journal_title="Sales Payment";
                        $gl->v_date=date('Y-m-d');
                        $gl->jv_id=$voucher_no;
                        $gl->journalvoucherbkdn_id=$jvb->id;
                        $gl->created_by=currentUserId();
                        $gl->company_id=company();
                        $gl->dr=($pay->amount -$pay->adjust_amount);
                        $gl->{$field_name}=$pay->p_terms;
                        $gl->save();
                    }
                    /* if adjust amount found */
                    if($pay->adjust_amount>0){
                        $deb=explode('~',"chieldheadones~9~Sales discounts-5205");
                        $jvadb=new Journalvoucherbkdn;
                        $jvadb->journalvoucher_id=$jv->id;
                        $jvadb->remarks="Sales Adjust";
                        $jvadb->account_code=$deb[2];
                        $jvadb->table_name=$deb[0];
                        $jvadb->table_id=$deb[1];
                        $jvadb->debit=$pay->adjust_amount;
                        if($jvadb->save()){
                            $table_name=$deb[0];
                            if($table_name=="masterheads"){$field_name="masterhead_id";}
    						else if($table_name=="subheads"){$field_name="subhead_id";}
    						else if($table_name=="chieldheadones"){$field_name="chieldheadone_id";}
    						else if($table_name=="chieldheadtwos"){$field_name="chieldheadtwo_id";}
    						$gl=new Generalledger;
                            $gl->journalvoucher_id=$jv->id;
                            $gl->journal_title="Sales Adjust";
                            $gl->v_date=date('Y-m-d');
                            $gl->jv_id=$voucher_no;
                            $gl->journalvoucherbkdn_id=$jvadb->id;
                            $gl->created_by=currentUserId();
                            $gl->company_id=company();
                            $gl->dr=$pay->adjust_amount;
                            $gl->{$field_name}=$deb[1];
                            $gl->save();
                        }
                    }
                    
                    $credit=explode('~',"chieldheadones~3~Account Receivable-1020");
                    $cjvb=new Journalvoucherbkdn;
                    $cjvb->journalvoucher_id=$jv->id;
                    $cjvb->remarks="Sales payment";
                    $cjvb->account_code=$credit[2];
                    $cjvb->table_name=$credit[0];
                    $cjvb->table_id=$credit[1];
                    $cjvb->credit=$jv->credit_sum;
                    if($cjvb->save()){
                        $table_name=$credit[0];
                        if($table_name=="masterheads"){$field_name="masterhead_id";}
						else if($table_name=="subheads"){$field_name="subhead_id";}
						else if($table_name=="chieldheadones"){$field_name="chieldheadone_id";}
						else if($table_name=="chieldheadtwos"){$field_name="chieldheadtwo_id";}
						$gl=new Generalledger;
                        $gl->journalvoucher_id=$jv->id;
                        $gl->journal_title="Sales to Customer";
                        $gl->v_date=date('Y-m-d');
                        $gl->jv_id=$voucher_no;
                        $gl->journalvoucherbkdn_id=$cjvb->id;
                        $gl->created_by=currentUserId();
                        $gl->company_id=company();
                        $gl->cr=$jv->credit_sum;
                        $gl->{$field_name}=$credit[1];
                        $gl->save();
                    }
                    
                }
            }
            
            /* update jv id */
            $pay->jv_id=$voucher_no;
            $pay->status=1;
            $pay->save();
            /* /update jv id */
            
            DB::commit();
            return redirect()->back()->with($this->responseMessage(true,null,"Data successfully created."));
            
        }catch(Exception $e){
			dd($e);
			DB::rollBack();
            return redirect()->back()->with($this->responseMessage(false,"error","Please try again!"));
        }
    }
    
    /**
     * Order Payment invoice
    */
    public function order_invoice (Request $r)
    {
        $id=$r->id;
        $inv_details = CrmOrder::find($id);
        $f_com = Company::find(company());
        
        $ren_data ='
            <div class="modal-header bill">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="">
                                <img src="'.url("storage/app/public/images/company/$f_com->logo").'" alt="'.$f_com->c_name.'" class="inv_img">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group bill_height mb-0">
                                <label class="bill_com_name bill_main_color">'.$f_com->company_name.'</label> <br>
                                <label class="bill_com_title">'.$f_com->title.'</label><br> 

                                <label class="bill_add bill_main_color mb-0">Registard Office:</label> <span class="c_info_add">'.$f_com->address.'</span><br>
                                <label class="bill_main_color font-weight-600 mb-0">Mobile :</label> <span class=""> '.$f_com->contact_no.' </span> <br>
                                <label class="bill_main_color font-weight-600 mb-0">VAT Registration number :</label> <span class=""> '.$f_com->reg_no.' </span> <br>
                                <label class="bill_main_color font-weight-600 mb-0">VAT - 6.3</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
        
        $ren_data .='
            <div class="modal-body">
                <div class="bill">
                    <div class="col-md-12 mb-3">
                        <div class="row m-0">
                            <div class="col-md-6 bg_lgray pt-3">
                                <div class="p-1">
                                    
                                    <h2>Invoice #MTL-BILL-'.str_pad($inv_details->id, 5, '0', STR_PAD_LEFT).'</h2>

                                    <table class="b_bottom">
                                        <tr>
                                            <td class="b_none w_25 p-0"><b>Invoice Date :</b></td>
                                            <td class="b_none text-left p-0"><b>'. date('d-m-Y',strtotime($inv_details->wo_dt)) .'</b></td>
                                        </tr>
                                        <tr>
                                            <td class="b_none w_25 p-0"><b>Due Date :</b></td>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->due_date .'</b></td>
                                        </tr>
                                        <tr>
                                            <td class="b_none w_25 p-0"><b>Company :</b></td>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->customer->company .'</b></td>
                                        </tr>
                                        <tr>
                                            <td class="b_none w_25 p-0"><b>Note :</b></td>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->short_des .'</b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-6 bg_lgray pt-3">
                                <div class="p-1">
                                    <h2>Invoiced To: '. $inv_details->customer->name .'</h2>

                                    <table class="b_bottom">
                                        
                                        <tr>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->customer->address .'</b></td>
                                        </tr>
                                        <tr>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->customer->contact .'</b></td>
                                        </tr>
                                        <tr>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->customer->email .'</b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <br>
                        </div>
                    </div>
                    <div class="table-responsive table-bordered padding-lr-15px bill mt-5">
        ';
        $ren_data .='
            <table class="mb-0">
                <thead>
                    <tr>
                        <th class="bill_th bg_gray">#SL</th>
                        <th class="bill_th bg_gray">Service</th>
                        <th class="bill_th_2 bg_gray">Description</th>
                        <th class="text-center bg_gray">Price</th>
                        <th class="text-center bg_gray">Discount</th>
                        <th class="text-center bg_gray">Tax</th>
                        <th class="text-center bg_gray">Total</th>
                    </tr>
                </thead>
                <tbody style="font-size:18px">
        ';

        $sl = 0;

        foreach ($inv_details->order_details as $i=>$i_d) 
        {
            $discount=$i_d->discount>0?$i_d->discount." ".$i_d->discount_type==1?"BDT":"%":"";
            $ren_data .= '
                <tr>
                    <td class="text-center b-tb-none "><b>'. ++$i . '.</b> </td>
                    <td class=""><span class="pl-3 "></span><b>' . $i_d->service->service_name . '</b></td>
                    <td class=""><span class="pl-3 "></span><b>' . $i_d->description . '</b></td>
                    <td class="text-center "><b>' . $i_d->price . '</b></td>
                    <td class="text-center "><b>' . $discount. '</b></td>
                    <td class="text-right "><b>' . $i_d->tax . '</b></td>
                    <td class="text-right "><b>' . $i_d->amount . '</b></td>
                </tr>
            ';
        }


        $ren_data .= '
                <tr>
                    <td class="b-tb-none "></td>
                    <td class="text-right b-tb-none " colspan="5"><b>Total Amount: </b></td>
                    <td class="text-right b-top "><b>'.$inv_details->sub_total.'</b></td>
                </tr>
                <tr>
                    <td class="b-tb-none "></td>
                    <td class="text-right b-tb-none " colspan="5"><b>Discount: </b></td>
                    <td class="text-right b-top "><b>'.$inv_details->total_discount.'</b></td>
                </tr>
                <tr>
                    <td class="b-t-none b-bottom "></td>
                    <td class="text-right b-t-none b-bottom " colspan="5"><b>Vat: </b> </td>
                    <td class="text-right b-top "><b>'.$inv_details->total_tax.'</b></td>
                </tr>
                <tr>
                    <td class="b-t-none b-bottom  bg_gray"></td>
                    <td class="text-right b-t-none b-bottom  bg_gray" colspan="5"><b>Payable Amount: </b> </td>
                    <td class="text-right b-top  bg_gray"><b>'.$inv_details->grand_total.'</b></td>
                </tr>

            </tbody>
            </table>
            </div>
        ';
 $f = numfmt_create("en", NumberFormatter::SPELLOUT);
        
        $ren_data .= '<p class="padding-left-30px padding-lr-15px mt-2" style="font-size:22px"><b> In Word: <span class="inWord"> '.ucwords($f->format($inv_details->grand_total)).'</span></b></p>';
        echo json_encode($ren_data);
    }
    
    /**
     *  Payment invoice
    */
    public function payment_invoice (Request $r)
    {
        $payment = CrmRcvdpayment::where('order_id',$r->order_id)->where('id','<=',$r->id)->get();
        $inv_details = CrmOrder::find($r->order_id);
        $f_com = Company::find(company());
        
        $ren_data ='
            <div class="modal-header bill">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="">
                                <img src="'.url("storage/app/public/images/company/$f_com->logo").'" alt="'.$f_com->c_name.'" class="inv_img">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group bill_height mb-0">
                                <label class="bill_com_name bill_main_color">'.$f_com->company_name.'</label> <br>
                                <label class="bill_com_title">'.$f_com->title.'</label><br> 

                                <label class="bill_add bill_main_color mb-0">Registard Office:</label> <span class="c_info_add">'.$f_com->address.'</span><br>
                                <label class="bill_main_color font-weight-600 mb-0">Mobile :</label> <span class=""> '.$f_com->contact_no.' </span> <br>
                                <label class="bill_main_color font-weight-600 mb-0">VAT Registration number :</label> <span class=""> '.$f_com->reg_no.' </span> <br>
                                <label class="bill_main_color font-weight-600 mb-0">VAT - 6.3</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
        
        $ren_data .='
            <div class="modal-body">
                <div class="bill">
                    <div class="col-md-12 mb-3">
                        <div class="row m-0">
                            <div class="col-md-6 bg_lgray pt-3">
                                <div class="p-1">
                                    
                                    <h2>Invoice #MTL-BILL-'.str_pad($inv_details->id, 5, '0', STR_PAD_LEFT).'</h2>

                                    <table class="b_bottom">
                                        <tr>
                                            <td class="b_none w_25 p-0"><b>Invoice Date :</b></td>
                                            <td class="b_none text-left p-0"><b>'. date('d-m-Y',strtotime($inv_details->wo_dt)) .'</b></td>
                                        </tr>
                                        <tr>
                                            <td class="b_none w_25 p-0"><b>Due Date :</b></td>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->due_date .'</b></td>
                                        </tr>
                                        <tr>
                                            <td class="b_none w_25 p-0"><b>Company :</b></td>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->customer->company .'</b></td>
                                        </tr>
                                        <tr>
                                            <td class="b_none w_25 p-0"><b>Note :</b></td>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->short_des .'</b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-6 bg_lgray pt-3">
                                <div class="p-1">
                                    <h2>Invoiced To: '. $inv_details->customer->name .'</h2>

                                    <table class="b_bottom">
                                        <tr>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->customer->address .'</b></td>
                                        </tr>
                                        <tr>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->customer->contact .'</b></td>
                                        </tr>
                                        <tr>
                                            <td class="b_none text-left p-0"><b>'. $inv_details->customer->email .'</b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <br>
                        </div>
                    </div>
                    <div class="table-responsive table-bordered padding-lr-15px bill mt-5">
        ';
        $ren_data .='
            <table class="mb-0">
                <thead>
                    <tr>
                        <th class="bill_th bg_gray">#SL</th>
                        <th class="bill_th bg_gray">Service</th>
                        <th class="bill_th_2 bg_gray">Description</th>
                        <th class="text-center bg_gray">Price</th>
                        <th class="text-center bg_gray">Discount</th>
                        <th class="text-center bg_gray">Tax</th>
                        <th class="text-center bg_gray">Total</th>
                    </tr>
                </thead>
                <tbody style="font-size:18px">
        ';

        $sl = 0;

        foreach ($inv_details->order_details as $i=>$i_d) 
        {
            $discount=$i_d->discount>0?$i_d->discount." ".$i_d->discount_type==1?"BDT":"%":"";
            $ren_data .= '
                <tr>
                    <td class="text-center b-tb-none "><b>'. ++$i . '.</b> </td>
                    <td class=""><span class="pl-3 "></span><b>' . $i_d->service->service_name . '</b></td>
                    <td class=""><span class="pl-3 "></span><b>' . $i_d->description . '</b></td>
                    <td class="text-center "><b>' . $i_d->price . '</b></td>
                    <td class="text-center "><b>' . $discount. '</b></td>
                    <td class="text-right "><b>' . $i_d->tax . '</b></td>
                    <td class="text-right "><b>' . $i_d->amount . '</b></td>
                </tr>
            ';
        }


        $ren_data .= '
                <tr>
                    <td class="b-tb-none "></td>
                    <td class="text-right b-tb-none " colspan="5"><b>Total Amount: </b></td>
                    <td class="text-right b-top "><b>'.$inv_details->sub_total.'</b></td>
                </tr>
                <tr>
                    <td class="b-tb-none "></td>
                    <td class="text-right b-tb-none " colspan="5"><b>Discount: </b></td>
                    <td class="text-right b-top "><b>'.$inv_details->total_discount.'</b></td>
                </tr>
                <tr>
                    <td class="b-t-none b-bottom "></td>
                    <td class="text-right b-t-none b-bottom " colspan="5"><b>Vat: </b> </td>
                    <td class="text-right b-top "><b>'.$inv_details->total_tax.'</b></td>
                </tr>
                <tr>
                    <td class="b-t-none b-bottom  bg_gray"></td>
                    <td class="text-right b-t-none b-bottom  bg_gray" colspan="5"><b>Payable Amount: </b> </td>
                    <td class="text-right b-top  bg_gray"><b>'.$inv_details->grand_total.'</b></td>
                </tr>

            </tbody>
            </table>
            </div>
        ';
        
        $f = numfmt_create("en", NumberFormatter::SPELLOUT);
        
        $ren_data .= '<p class="padding-left-30px padding-lr-15px mt-2"><b> In Word: <span class="inWord"> '.ucwords($f->format($inv_details->grand_total)).'</span></b></p>

                    <h3 class="padding-left-14px mx-3 py-1">Transactions</h3>';
        
        $ren_data .= '<div class="table-responsive table-bordered padding-lr-15px bill">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center bg_gray">Transaction Date</th>
                                    <th class="text-center bg_gray">Check No</th>
                                    <th class="text-center bg_gray">Receipt / Transaction No</th>
                                    <th class="text-center bg_gray">Payment Note</th>
                                    <th class="text-right bg_gray">Amount</th>
                                    <th class="text-right bg_gray">Adjust Amount</th>
                                </tr>
                            </thead>
                        <tbody class="fs-13">
                    ';

        if ($payment) {
            $t_pay = 0;
            foreach ($payment as $i_d){
                $t_pay +=($i_d->amount + $i_d->adjust_amount);
                $ren_data .='
                    <tr>
                        <td class="text-center py-0">'.$i_d->pdate.'</td>
                        <td class="text-center py-0">'.$i_d->cheque_no.'</td>
                        <td class="text-center py-0">MTL-Payment-'.$i_d->id.'</td>
                        <td class="text-center py-0">'.$i_d->note.'</td>
                        <td class="text-right py-0"><b>'.$i_d->amount.'</b></td>
                        <td class="text-right py-0"><b>'.$i_d->adjust_amount.'</b></td>
                    </tr>
                ';
            }
        } else {

            $ren_data .='
                <tr>
                    <td class="text-center text-danger" colspan="6"><b>Nothing Found</b></td>
                </tr>
            ';
        }

        $ren_data .='
            <tr>
                <td class="text-right bg_gray" colspan="4"><b>Total Pay:</b></td>
                <td class="text-right bg_gray"><b>'.$t_pay.'</b></td>
                <td></td>
            </tr>
            <tr>
                <td class="text-right bg_gray" colspan="4"><b>Due:</b></td>
                <td class="text-right bg_gray"><b>'.($inv_details->grand_total - $t_pay).'</b></td>
                <td></td>
            </tr>
        ';
        $ren_data .='
                        </tbody>
                    </table>
                </div>';

        echo json_encode($ren_data);
    }


}
