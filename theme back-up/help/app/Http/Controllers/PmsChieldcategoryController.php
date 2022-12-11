<?php

namespace App\Http\Controllers;

use App\Models\pms_chieldcategory;
use App\Models\pms_subcategory;
use App\Models\pms_category;
use Illuminate\Http\Request;
use App\Http\Requests\Pms_chieldcategory\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class PmsChieldcategoryController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chieldcat=pms_chieldcategory::paginate(10);
        $subcat=pms_subcategory::get();
        $cat=pms_category::get();
		return view('pms.chieldcategory.index',compact('chieldcat','subcat','cat'));
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
            $chieldcat=new pms_chieldcategory;
            $chieldcat->category_id=$r->category_name;
            $chieldcat->subcategory_id=$r->subcategory_name;
            $chieldcat->chieldcategory_name=$r->chieldcategory_name;
            
            if(!!$chieldcat->save()){
                return redirect(route('pmschieldcategory.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('pmschieldcategory.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pms_chieldcategory  $pms_chieldcategory
     * @return \Illuminate\Http\Response
     */
    public function show(pms_chieldcategory $pms_chieldcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pms_chieldcategory  $pms_chieldcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(pms_chieldcategory $pms_chieldcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pms_chieldcategory  $pms_chieldcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pms_chieldcategory $pms_chieldcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pms_chieldcategory  $pms_chieldcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(pms_chieldcategory $pms_chieldcategory)
    {
        //
    }
}
