@extends('Master.master')

@section('title','Student Information')

@section('nav')
<div class="collapse navbar-collapse " id="navbar-list-4">
   <ul class="navbar-nav ml-auto mr-1">
      <h6 style="margin:auto auto">{{$studentData[0]->name}}</h6>
      <li class="nav-item dropdown ">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="50" height="50" class="rounded-circle">
         </a>
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" data-target="#editprofile" data-toggle="modal">Edit Profile</a>
            <a class="dropdown-item" href="/logout">Log Out</a>
         </div>
      </li>
   </ul>
</div>
@endsection

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
                     <h5>Birth Date: {{$studentData[0]->birthdate}} </h5>
                     <h5>GPA:{{$studentData[0]->gpa}}</h5>
                  </div>
                  <div class="col-5" style="margin-top:6%">
                     <h5>Lastname: {{$studentData[0]->lastname}}</h5>
                     <h5>Phone: {{$studentData[0]->student_phone}}</h5>
                     <h5>Age: {{Carbon\Carbon::now()->diffInYears($studentData[0]->birthdate)}}</h5>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="section BG3" id="section">
   <div class="container">
      <div class="row" style="margin-top: 5%;">
         <div class="col">
            <h1>Current Course</h1>
         </div>
         <div class="col-3" style="text-align: end;margin-top:1.5%">
            <a href="/enroll/{{$studentData[0]->id}}"><button class="btn btn-success">add course</button></a>
         </div>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Course ID</th>
               <th scope="col">Course Name</th>
               <th scope="col">Credit</th>
               <th scope="col">Grade</th>
               <th scope="col">Operation</th>
            </tr>
         </thead>

         <tbody>
            @foreach ($courseOfStudent as $list)
            <tr>
               <th scope="row">{{$list->course_id}}</th>
               <td>{{$list->course_name}}</td>
               <td>{{$list->credit}}</td>
               <td>{{$list->grade}}</td>
               <td>
                  <div class="row">
                     <a href="/registration/delete/{{$list->registration_id}}"><button class='btn btn-danger'>Drop</button></a>
                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
<script type="text/javascript">
   var myFullpage = new fullpage('#fullpage', {
      /* sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'], */
      anchors: ['firstPage', 'secondPage'],
      navigation: true,
      navigationTooltips: ['Profile', 'Course'],
      showActiveTooltip: true,
      menu: '#menu'
   });
</script>
@endsection