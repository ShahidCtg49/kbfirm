<?php

namespace App\Http\Controllers;

use App\Http\Requests\Document\AddNewRequest;
use App\Http\Requests\Document\UpdateRequest;
use App\Models\Document;
use Exception;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents=Document::paginate(10);
        return view('document.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.create');
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
        $cat= new Document;
        $cat->document_id=$r->document;
        $cat->date=$r->date;
        $cat->name=$r->name;
        $cat->remark=$r->remark;

        if($r->hasFile('image')){
            $imageName = rand(111,999).time().'.'.$r->image->extension();  
            $r->image->move(public_path('uploads/document'), $imageName);
            $r->image=$imageName;
        }

        $r->status=1;
        if($r->save()){
            return redirect('document')->with('success','Data saved');
        }
    }
    catch(Exception $e){
        //dd($e);
        return back()->withInput();
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $documents = Document::paginate(10);
        return view('document.edit',compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Document $document)
    {
        try{
            $p= $document;
            $p->document_id=$request->document;
            $p->date=$request->date;
            $p->name=$request->name;
            $p->remark=$request->remark;

            if($request->hasFile('image')){
                $imageName = rand(111,999).time().'.'.$request->image->extension();  
                $request->image->move(public_path('uploads/document'), $imageName);
                $p->image=$imageName;
            }

            $p->status=1;
            if($p->save()){
                return redirect('document')->with('success','Data saved');
            }
        }
        catch(Exception $e){
            //dd($e);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->back();
    }
}
