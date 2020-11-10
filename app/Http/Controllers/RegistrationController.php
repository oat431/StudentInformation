<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'student_id' => 'required',
            'course_id' => 'required'
        ]);
        $regis = new Registration;
        $regis->student_id = $data['student_id'];
        $regis->course_id = $data['course_id'];
        $regis->save();
        return redirect('/student/'.$data['student_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('registrations')->where('student_id',$id)->get();
        $courseID = [];
        $grade = [];
        foreach($data as $item){
            array_push($courseID,$item->course_id);
            array_push($grade,$item->grade);
        }
        print_r($grade);
        $creditData = 0;
        $sum = 0; 
        for($i=0;$i<sizeof($courseID);$i++){
            $cd = DB::table('courses')->where('course_id',$courseID[$i])->get();
            $creditData += $cd[0]->credit;
            switch($grade[$i]){
                case 'A':$sum+=4*$cd[0]->credit;break;
                case 'B+':$sum+=3.5*$cd[0]->credit;break;
                case 'B':$sum+=3*$cd[0]->credit;break;
                case 'C+':$sum+=2.5*$cd[0]->credit;break;
                case 'C':$sum+=2*$cd[0]->credit;break;
                case 'D+':$sum+=1.5*$cd[0]->credit;break;
                case 'D':$sum+=1*$cd[0]->credit;break;
                case 'F':$sum+=0;break;
                default :
                    $sum +=4*$cd[0]->credit;
                    break;
            }
        }
        $realGrade =number_format($sum / $creditData,2);
        echo $realGrade;
        DB::update("UPDATE users SET gpa=? where id=?",[$realGrade,$id]);
        return redirect("/admin");
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
        DB::delete("DELETE from registrations where registration_id = ?",[$id]);
        return redirect('/');
    }
}
