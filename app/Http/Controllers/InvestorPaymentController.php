<?php

namespace App\Http\Controllers;

use App\Models\InvestorPayment;
use Illuminate\Http\Request;

class InvestorPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investorPayment= InvestorPayment::paginate(10);
        return view('investorPayment.index',compact('investorPayment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('investorPayment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new investorPayment;
        $cat->investor_id = $request->investor_id;
        $cat->name = $request->name;
        $cat->date = $request->date;
        $cat->book_no = $request->book_no;
        $cat->receipt_no = $request->receipt_no;
        $cat->picture = $request->picture;
        $cat->particulars = $request->particulars;
        $cat->payment_method = $request->payment_method;
        $cat->collection_for_month = $request->collection_for_month;
        $cat->amount = $request->amount;
        $cat->per_share_amount = $request->per_share_amount;
        $cat->total_deposits = $request->total_deposits;
        $cat->dues = $request->dues;
        $cat->advance = $request->advance;
        $cat->account_status = $request->account_status;
        $cat->save();
        return redirect()->route('investorPayment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvestorPayment  $investorPayment
     * @return \Illuminate\Http\Response
     */
    public function show(InvestorPayment $investorPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvestorPayment  $investorPayment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $investorPayment = InvestorPayment::findOrFail($id);
        return view('investorPayment.edit',compact('investorPayment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvestorPayment  $investorPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $investorPayment=investorPayment::find($id);
        $investorPayment->investor_id = $request->investor_id;
        $investorPayment->name = $request->name;
        $investorPayment->date = $request->date;
        $investorPayment->book_no = $request->book_no;
        $investorPayment->receipt_no = $request->receipt_no;
        $investorPayment->picture = $request->picture;
        $investorPayment->particulars = $request->particulars;
        $investorPayment->payment_method = $request->payment_method;
        $investorPayment->collection_for_month = $request->collection_for_month;
        $investorPayment->amount = $request->amount;
        $investorPayment->per_share_amount = $request->per_share_amount;
        $investorPayment->total_deposits = $request->total_deposits;
        $investorPayment->dues = $request->dues;
        $investorPayment->advance = $request->advance;
        $investorPayment->account_status = $request->account_status;
        $investorPayment->save();
        return redirect()->route('investorPayment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvestorPayment  $investorPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        InvestorPayment::find($id)->delete();
        return redirect()->back();
    }
}
