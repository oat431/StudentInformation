<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'nullable'
        ]);
        $student = new User;
        $student->name = $data['regname'];
        $student->lastname = $data['reglastname'];
        $student->email = $data['regusername'];
        $student->password = Hash::make($data['regpassword']);
        $student->birthdate = $data['regbirthdate'];
        $student->student_phone = $data['regphone'];
        $student->gender = $data['Gender'];
        $student->student_img = isset($data['image']) ? '/pic/'.$data['image'] : '../assets/unknown.png';
        $student->save();
        Storage::disk('public_uploads')->put('/pic/'.$data['image'],'');
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentData = DB::table('users')->where('id', $id)->get();
        $courseData = DB::table('registrations')->where('student_id', $id)->get();
        $courseOfStudent = [];
        for ($i = 0; $i < sizeof($courseData); $i++) {
            $detail = DB::table('courses')->where('course_id', $courseData[$i]->course_id)->get();
            $detail[0]->grade = $courseData[$i]->grade;
            $detail[0]->registration_id = $courseData[$i]->registration_id;
            array_push($courseOfStudent, $detail[0]);
        }
        return view('Student.showStudentData', compact(['studentData', 'courseOfStudent']));
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
        $data = $request->validate([
            'editname' => 'required',
            'editlastname' => 'required',
            'editbirthdate' => 'required',
            'editphone' => 'required',
            'image' => 'nullable'
        ]);

        $name = $data['editname'];
        $lastname = $data['editlastname'];
        $birthdate = $data['editbirthdate'];
        $phone = $data['editphone'];
        $image = isset($data['image']) ? '/pic/'.$data['image'] : "../asset/unknow.jpg";
        
        DB::update("UPDATE users Set name=?,lastname=?,birthdate=?,student_phone=?,student_img=? where id = ?",[$name,$lastname,$birthdate,$phone,$image,$id]);
        Storage::disk('public_uploads')->put('/pic/'.$data['image'],'');
        return redirect('/student/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE from users where id=?",[$id]);
        return redirect('/');
    }
}
