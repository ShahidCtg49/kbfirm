<?php

namespace App\Http\Controllers;

use App\Models\Hrm_section;
use Illuminate\Http\Request;
use App\Http\Requests\Hrm_section\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class HrmSectionController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $section=Hrm_section::paginate(10);
		return view('hrm.section.index',compact('section'));
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
            $section=new Hrm_section;
            $section->section_name=$r->section_name;
            $section->section_desc=$r->section_desc;
            
            if(!!$section->save()){
                return redirect(route('section.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('section.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm_section  $hrm_section
     * @return \Illuminate\Http\Response
     */
    public function show(Hrm_section $hrm_section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm_section  $hrm_section
     * @return \Illuminate\Http\Response
     */
    public function edit(Hrm_section $hrm_section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrm_section  $hrm_section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrm_section $hrm_section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm_section  $hrm_section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrm_section $hrm_section)
    {
        //
    }
}
