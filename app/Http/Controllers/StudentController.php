<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Grade;
use App\Section;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Collection;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $grades = Grade::pluck('name', 'id')->unique();
        $sections = Section::pluck('name','id')->unique();
        return view('student.index',compact('grades','sections'));
    }

    public function data(Request $request)
    {
        $model = new Collection;
        if($request->ajax())
        {
            $students = Student::all();
            foreach ($students as $student) 
            {
                $model->push([
                    'id' => $student->id,
                    'name'=>$student->name,
                    'father_name'=>$student->father_name,
                    'phone_no'=>$student->phone_no,
                    'address'=>$student->address,
                    'grade'=>$student->grade,
                    'section'=>$student->section,

                ]);
            }
            return Datatables::of($model)
            ->editColumn("grade", function($model) 
            {
                    $grade = Grade::where('id', $model['grade'])->first();
                    return $grade->name;
            })
            ->editColumn("section", function($model) 
            {
                    $section = Section::where('id', $model['section'])->first();
                    return $section->name;
            })
            ->addColumn("edit", function($model) 
            {
                    return view('student.partials.edit_btn', compact('model'));
            })
            ->addColumn("delete", function($model) 
            {
                    return view('student.partials.delete_btn', compact('model'));
            })
            ->rawColumns(['edit','delete'])
            ->make(true);
        }
        return abort(404);

    }

    public function getGrade($my)
    {
        $grades = \DB::table('students')->where('grade',$my)->get();
        
        return response()->json($grades);

    }

    public function getSection($my)
    {
        $sections = \DB::table('students')->where('section',$my)->get();
        return response()->json($sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::pluck('name','id');
        $sections = Section::pluck('name','id');
        return view('student.create',compact('grades','sections')); 
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
            'fathername'=>'required',
            'phone_no'=>'required',
            'address'=>'required',
            'grade'=>'required',
            'section'=>'required',
        ]);
        Student::create([
            'name' => $request->name,
            'father_name'=>$request->fathername,
            'phone_no'=>$request->phone_no,
            'address'=>$request->address,
            'grade' => $request->grade,
            'section'=>$request->section,
        ]);
        return redirect('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grades = Grade::pluck('name','id');
        $sections = Section::pluck('name','id');
        return view('student.edit',compact('id','grades','sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        \DB::table('students')->where('id',$id)->update([
            'name' => $request->name,
            'father_name'=>$request->fathername,
            'phone_no'=>$request->phone_no,
            'address'=>$request->address,
            'grade' => $request->grade,
            'section'=>$request->section,
        ]);
        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('student');
    }

    
}
