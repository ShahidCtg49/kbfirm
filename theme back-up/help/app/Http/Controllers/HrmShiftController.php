<?php

namespace App\Http\Controllers;

use App\Models\Hrm_shift;
use Illuminate\Http\Request;
use App\Http\Requests\Shift\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;
class HrmShiftController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift=Hrm_shift::paginate(10);
		return view('hrm.shift.index',compact('shift'));
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
            $shift=new Hrm_shift;
            $shift->shift_name=$r->shift_name;
            $shift->start_time=$r->start_time;
            $shift->end_time=$r->end_time;
            $shift->time_allow=$r->time_allow;
            $shift->shift_desc=$r->shift_desc;
            
            if(!!$shift->save()){
                return redirect(route('shift.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('shift.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm_shift  $hrm_shift
     * @return \Illuminate\Http\Response
     */
    public function show(Hrm_shift $hrm_shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm_shift  $hrm_shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Hrm_shift $hrm_shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrm_shift  $hrm_shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrm_shift $hrm_shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm_shift  $hrm_shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrm_shift $hrm_shift)
    {
        //
    }
}
