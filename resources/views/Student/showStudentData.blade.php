@extends('Master.master')

@section('title','Student Information')

@section('section')
<div class="section BG2" id="section">
   <div class="container" style="margin-top: 4%;">
      <div class="card text-dark border-dark">
         <div class="card-body">
            <div class="card-title" style="color: #504f50;margin-left:3%">
               <h1>Student Information</h1>
            </div>
            <br>
            <div class="card-text" style="padding: 3%;">
               <div class="row" style="margin-left: 3%;">
                  <div class="col-4">
                     <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" style="margin-right:5%;width:280px;height:280px">
                  </div>
                  <div class="col-3" style="margin-top:6%">
                     <h5>Name: {{$studentData[0]->name}}</h5>
                     <h5>Gender: {{$studentData[0]->gender}}</h5>
                     <h5>Birth Date: {{$studentData[0]->birthdate}}</h5>
                     <h5>GPA:{{$studentData[0]->gpa}}</h5>
                  </div>
                  <div class="col-5" style="margin-top:6%">
                     <h5>Lastname: </h5>
                     <h5>Phone: {{$studentData[0]->student_phone}}</h5>
                     <h5>Age: xxx </h5>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection