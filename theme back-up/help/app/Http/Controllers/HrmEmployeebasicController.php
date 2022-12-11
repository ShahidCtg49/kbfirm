<?php

namespace App\Http\Controllers;

use App\Models\Hrm_employeebasic;
use Illuminate\Http\Request;
use App\Http\Requests\Hrm_employeebasic\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class HrmEmployeebasicController extends Controller
{
    use ResponseTrait,ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=Hrm_employeebasic::paginate(10);
		return view('hrm.employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hrm.employee.create');
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
            $empbasic=new Hrm_employeebasic;
            $empbasic->emp_id=1;
            $empbasic->emp_name=$r->emp_name;
            $empbasic->emp_short_name=$r->emp_short_name;
            $empbasic->emp_father=$r->emp_father;
            $empbasic->emp_mother=$r->emp_mother;
            $empbasic->emp_present_address=$r->emp_present_address;
            $empbasic->emp_parmanent_address=$r->emp_parmanent_address;
            $empbasic->emp_nid=$r->emp_nid;
            $empbasic->emp_email=$r->emp_email;
            $empbasic->emp_mobile=$r->emp_mobile;
            $empbasic->emp_alt_mobile=$r->emp_alt_mobile;
            $empbasic->emp_gender=$r->emp_gender;
            $empbasic->emp_blood=$r->emp_blood;
            $empbasic->emp_maritals_tatus=$r->emp_maritals_tatus;
            $empbasic->emp_religion=$r->emp_religion;
            $empbasic->emp_spouse=$r->emp_spouse;
            $empbasic->emp_nationality=$r->emp_nationality;
            $empbasic->emp_dob=$r->emp_dob;
            $empbasic->emp_passport_no=$r->emp_passport_no;
            $empbasic->emp_passport_issue_date=$r->emp_passport_issue_date;
            $empbasic->emp_passport_exp_date=$r->emp_passport_exp_date;
            $empbasic->emp_nomini_name=$r->emp_nomini_name;
            $empbasic->emp_nomini_relation=$r->emp_nomini_relation;
            $empbasic->emp_nomini_contact_no=$r->emp_nomini_contact_no;
            $empbasic->emp_status=$r->emp_status;
            $empbasic->total_salary=$r->total_salary;
            $empbasic->emp_password=sha1(md5($r->emp_password));
            $empbasic->emp_image="image";
            $empbasic->created_by=currentUserId();
			
            if(!!$empbasic->save()){
                return redirect(route('employeebasic.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			//dd($e);
            return redirect(route('employeebasic.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm_employeebasic  $hrm_employeebasic
     * @return \Illuminate\Http\Response
     */
    public function show(Hrm_employeebasic $hrm_employeebasic)
    {
        $employee = Hrm_employeebasic::all();
        return view('hrm.employee.show',compact('employee'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm_employeebasic  $hrm_employeebasic
     * @return \Illuminate\Http\Response
     */
    public function edit(Hrm_employeebasic $employeebasic)
    {
        $emp = $employeebasic;
        return view('hrm.employee.edit',compact('emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrm_employeebasic  $hrm_employeebasic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        try{
            $empbasic=Hrm_employeebasic::find($id);
            $empbasic->emp_name=$r->emp_name;
            $empbasic->emp_short_name=$r->emp_short_name;
            $empbasic->emp_father=$r->emp_father;
            $empbasic->emp_mother=$r->emp_mother;
            $empbasic->emp_present_address=$r->emp_present_address;
            $empbasic->emp_parmanent_address=$r->emp_parmanent_address;
            $empbasic->emp_nid=$r->emp_nid;
            $empbasic->emp_email=$r->emp_email;
            $empbasic->emp_mobile=$r->emp_mobile;
            $empbasic->emp_alt_mobile=$r->emp_alt_mobile;
            $empbasic->emp_gender=$r->emp_gender;
            $empbasic->emp_blood=$r->emp_blood;
            $empbasic->emp_maritals_tatus=$r->emp_maritals_tatus;
            $empbasic->emp_religion=$r->emp_religion;
            $empbasic->emp_spouse=$r->emp_spouse;
            $empbasic->emp_nationality=$r->emp_nationality;
            $empbasic->emp_dob=$r->emp_dob;
            $empbasic->emp_passport_no=$r->emp_passport_no;
            $empbasic->emp_passport_issue_date=$r->emp_passport_issue_date;
            $empbasic->emp_passport_exp_date=$r->emp_passport_exp_date;
            $empbasic->emp_nomini_name=$r->emp_nomini_name;
            $empbasic->emp_nomini_relation=$r->emp_nomini_relation;
            $empbasic->emp_nomini_contact_no=$r->emp_nomini_contact_no;
            $empbasic->emp_status=$r->emp_status;
            $empbasic->total_salary=$r->total_salary;
			if($r->emp_password)
				$empbasic->emp_password=sha1(md5($r->emp_password));

			if ($r->has('emp_image'))
				if ($this->deleteImage($empbasic->emp_image, 'employee/photo'))
					$empbasic->emp_image = $this->uploadImage($r->file('emp_image'), 'employee/photo');
				else
					$empbasic->emp_image = $this->uploadImage($r->file('emp_image'), 'employee/photo');

            if(!!$empbasic->save()){
                return redirect(route('employeebasic.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect()->back()->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm_employeebasic  $hrm_employeebasic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrm_employeebasic $hrm_employeebasic)
    {
        //
    }

    
}
