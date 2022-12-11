<?php

namespace App\Http\Controllers;

use App\Models\Pms_item;
use App\Models\Pms_stockentry;
use App\Models\Pms_unit;
use App\Models\Pms_warehouse;
use App\Models\pms_category;
use App\Models\pms_subcategory;
use App\Models\pms_chieldcategory;
use App\Models\pms_brand;
use App\Models\Pms_manufac;
use App\Models\Tax;
use Illuminate\Http\Request;

use App\Http\Traits\ResponseTrait;
use Exception;
use DB;

class PmsItemController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item=Pms_item::paginate(10);
		return view('pms.item.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item=Pms_item::get();
        $stock=Pms_stockentry::get();
        $unit=Pms_unit::get();
        $warehouse=Pms_warehouse::get();
        $cat=pms_category::get();
        $subcat=pms_subcategory::get();
        $chieldcat=pms_chieldcategory::get();
        $brand=pms_brand::get();
        $manufac=Pms_manufac::get();
        $tax=Tax::get();
		return view('pms.item.create',compact('item','stock','unit','warehouse','cat','subcat','chieldcat','brand','manufac','tax'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $item=new Pms_item;
            $item->item_name=$request->item_name;
            $item->pms_categori_id=$request->pms_categori_id;
            $item->pms_subcategori_id=$request->pms_subcategori_id;
            $item->pms_chieldcategori_id=$request->pms_chieldcategori_id;
            $item->pms_brand_id=$request->pms_brand_id;
            $item->sku=$request->sku;
            $item->hsn=$request->hsn;
            $item->alert_qty=$request->alert_qty;
            $item->lot_number=$request->lot_number;
            $item->expire_date=$request->expire_date;
            $item->custom_barcode=$request->custom_barcode;
            $item->pms_manufac_id=$request->pms_manufac_id;
            $item->description=$request->description;
            $item->item_image="image";
            $item->price=$request->price;
            $item->tax_id=$request->tax_id;
            $item->purchase_price=$request->purchase_price;
            $item->tax_type=$request->tax_type;
            $item->profit_margin=$request->profit_margin;
            $item->sales_price=$request->sales_price;
            $item->final_price=$request->final_price;
            $item->stock=$request->stock;
            $item->company_id=company();
            $item->branch_id=branch();
            $item->created_by=currentUserId();
            $item->status=1;
            if($item->save()){

                $itemcode=Pms_item::find($item->id);
                $itemcode->item_code="IT".str_pad($item->id, 6, "0", STR_PAD_LEFT);
                $itemcode->save();

                $stock=new Pms_stockentry;
                $stock->batch_id=time();
                $stock->entry_date=date("Y-m-d");
                $stock->pms_item_id=$item->id;
                $stock->qty=$request->stock;
                $stock->pms_warehouse_id=$request->pms_warehouse_id;
                $stock->purchase_price=$request->purchase_price;
                $stock->note=$request->note;
                $stock->status=1;
                $stock->save();
                DB::commit();
                return redirect(route('pmsitem.index'))->with($this->responseMessage(true, null, 'Voucher created'));
            }
        }catch (Exception $e) {
            dd($e);
			DB::rollBack();
			return redirect()->back()->with($this->responseMessage(false, 'error', 'Please try again!'));
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pms_item  $pms_item
     * @return \Illuminate\Http\Response
     */
    public function show(Pms_item $pms_item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pms_item  $pms_item
     * @return \Illuminate\Http\Response
     */
    public function edit(Pms_item $pms_item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pms_item  $pms_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pms_item $pms_item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pms_item  $pms_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pms_item $pms_item)
    {
        //
    }
}
