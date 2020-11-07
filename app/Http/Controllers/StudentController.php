<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Student.student');
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
    public function store(Request $request)
    {
        $data = $request->validate([
           'regname' => 'required',
           'reglastname' => 'required',
           'regusername' => 'required',
           'regpassword' => 'required',
           'regbirthdate' => 'required',
           'regphone' => 'required',
           'Gender' => 'required',
           'image' =>'required'
        ]); 
        $student = new User;
        $student->name = $data['regname'];
        $student->lastname = $data['reglastname'];
        $student->email = $data['regusername'];
        $student->password = Hash::make($data['regpassword']);
        $student->birthdate = $data['regbirthdate'];
        $student->student_phone = $data['regphone'];
        $student->gender = $data['Gender'];
        $student->student_img = $data['image'];
        $student->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentData = DB::table('users')->where('id',$id)->get();
        $courseData = DB::table('registrations')->where('student_id',$id)->get();
        $courseOfStudent = [];
        for($i=0;$i<sizeof($courseData);$i++){
            $detail = DB::table('courses')->where('course_id',$courseData[$i]->course_id)->get();
            $detail[0]->grade = $courseData[$i]->grade; 
            array_push($courseOfStudent,$detail[0]);
        } 
        // print_r($courseOfStudent);
        return view('Student.showStudentData',compact(['studentData','courseOfStudent']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
