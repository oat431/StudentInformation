<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Course;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            'courseid' => 'required',
            'coursename' => 'required',
            'coursecredit' => 'required'
        ]);
        $course = new Course;
        $course->course_id = $data['courseid'];
        $course->course_name = $data['coursename'];
        $course->credit = $data['coursecredit'];
        $course->save();
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courseList = DB::table('courses')->get();
        $temp = [];
        for($i=0;$i<sizeof($courseList);$i++){
            array_push($temp,$courseList[$i]->course_id);
        }
        $regis = DB::table('registrations')->where('student_id',$id)->get(); 
        $courseData = [];
        $index = 0;
        for($i=0;$i<sizeof($regis);$i++){
            for($j=0;$j<sizeof($temp);$j++){
                if($regis[$i]->course_id == $temp[$j]){
                    $temp[$j] = "xxxxxx";
                    break;
                }
            } 
        }
        foreach($temp as $i){
            if($i != "xxxxxx"){
                $data = DB::table('courses')->where('course_id',$i)->get();
                array_push($courseData,$data[0]);
            }
        }
        return view('Student.Enroll',compact(['courseData','id']));
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
            'find' => 'required',
            'editcoursename' => 'required',
            'editcoursecredit' => 'required'
        ]);
        $course_id = $data['find'];
        $course_name = $data['editcoursename'];
        $credit = $data['editcoursecredit'];

        DB::update('UPDATE courses SET course_name=?,credit=? where course_id=?',[$course_name,$credit,$course_id]);
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete("DELETE from courses where course_id=?",[$id]);
        return redirect('/admin');
    }
}
