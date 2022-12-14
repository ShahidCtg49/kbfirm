<?php

namespace App\Http\Controllers;

use App\Models\pms_subcategory;
use App\Models\pms_category;
use Illuminate\Http\Request;
use App\Http\Requests\Pms_subcategory\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;


class PmsSubcategoryController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory=pms_subcategory::paginate(10);
        $category=pms_category::get();
		return view('pms.subcategory.index',compact('subcategory','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $subcat=new pms_subcategory;
            $subcat->category_id=$r->category_name;
            $subcat->subcategory_name=$r->subcategory_name;
            
            if(!!$subcat->save()){
                return redirect(route('pmssubcategory.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('pmssubcategory.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pms_subcategory  $pms_subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(pms_subcategory $pms_subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pms_subcategory  $pms_subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(pms_subcategory $pms_subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pms_subcategory  $pms_subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pms_subcategory $pms_subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pms_subcategory  $pms_subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(pms_subcategory $pms_subcategory)
    {
        //
    }
}
