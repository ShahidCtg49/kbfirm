<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\Company\AddNewRequest;
use App\Http\Traits\ResponseTrait;
use Exception;
use App\Http\Traits\ImageHandleTraits;

class CompanyController extends Controller
{
    use ResponseTrait,ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company=Company::paginate(10);
		return view('company.index',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $r)
    {
        try {
            $company=new Company;
            $company->company_name=$r->company_name;
            $company->title=$r->title;
            $company->reg_no=$r->reg_no;
            $company->address=$r->address;
            $company->location=$r->location;
            $company->contact_no=$r->contact_no;
            $company->alt_contact_no=$r->alt_contact_no;
            $company->email=$r->email;
            $company->created_by=currentUserId();
            if($r->has('logo')) $patient->logo = $this->uploadImage($r->file('logo'), 'company');
			
            if(!!$company->save()){
                return redirect(route('company.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('company.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Company $company)
    {
        try {
            $company->company_name=$r->company_name;
            $company->title=$r->title;
            $company->reg_no=$r->reg_no;
            $company->address=$r->address;
            $company->location=$r->location;
            $company->contact_no=$r->contact_no;
            $company->alt_contact_no=$r->alt_contact_no;
            $company->email=$r->email;
            if($r->has('logo')) $company->logo = $this->uploadImage($r->file('logo'), 'company');
			
            if(!!$company->save()){
                return redirect(route('company.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('company.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
