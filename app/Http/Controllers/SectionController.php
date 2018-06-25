<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use App\Grade;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('section.index');
    }

    public function data(Request $request)
    {
         $model = new Collection;
        if($request->ajax())
        {
            $sections = Section::all();
            foreach ($sections as $section) 
            {
                $model->push([
                    'id' => $section->id,
                    'name'=>$section->name,
                    'grade'=>$section->grade_id,
                    

                ]);
            }

            return Datatables::of($model) 
            ->editColumn("grade", function($model) 
            {
                    $grade = Grade::where('id', $model['grade'])->first();
                    return $grade->name;
            })
            ->addColumn("edit", function($model) 
            {
                    return view('section.partials.edit_btn', compact('model'));
            })
            ->addColumn("delete", function($model) 
            {
                    return view('section.partials.delete_btn', compact('model'));
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
        }  
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Grade::pluck('name','id');
        return view('section.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $this->validate($request, [
            'name' => 'required',
        ]);
        Section::create([
            'name' => $request->name,
            'grade_id' => $request->category,
        ]);
        return redirect('section');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Grade::pluck('name','id');
        return view('section.edit',compact('id','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \DB::table('sections')->where('id',$id)->update([
            'name'        => $request->name,
            'grade_id' => $request->category,
        ]);
        return redirect('/section');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Section::destroy($id);
    }
}
