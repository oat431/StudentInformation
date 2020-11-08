@extends('Master.master')

@section('title','Admin Page')

@section('section')

<div class="section BG3" id="section">
   <div class="container">
      <div class="row" style="margin-top: 5%;">
         <div class="col">
            <h1>Approve</h1>
         </div>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Student ID</th>
               <th scope="col">Name</th>
               <th scope="col">Username</th>
               <th scope="col">Gender</th>
               <th scope="col">Age</th>
               <th scope="col">Approve</th>
            </tr>
         </thead>

         <tbody>
            <tr>
               <th scope="row">xxxxxx</th>
               <td>xxxxxxxxxxxx</td>
               <td>xxxxxxxxx</td>
               <td>xxxxxxxxx</td>
               <td>xxxxxxxx</td>
               <td>
                  <div class="row">
                     {{Form::open(array('url' => '/','method'=>'get','style'=>'margin-right:2%'))}}
                     {{Form::submit('Yes',['class'=>'btn btn-success'])}}
                     {{Form::close()}}

                     {{Form::open(array('url' => '/','method'=>'get'))}}
                     {{Form::submit('No',['class'=>'btn btn-danger'])}}
                     {{Form::close()}}
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>

<div class="section BG3" id="section">
   <div class="container">
      <div class="row" style="margin-top: 5%;">
         <div class="col">
            <h1>Course</h1>
         </div>
         <div class="col-3" style="text-align: end;margin-top:1.5%">
            <!--  {{Form::open(array('url' => '/'))}} -->
            {{Form::submit('Add Course',['class'=>'btn btn-success','data-target'=>'#addcourse', 'data-toggle'=>'modal'])}}
            <!--  {{Form::close()}} -->
         </div>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Course ID</th>
               <th scope="col">Course Name</th>
               <th scope="col">Credit</th>
               <th scope="col">Operation</th>
            </tr>
         </thead>

         <tbody>
            <tr>
               <th scope="row">xxxxxx</th>
               <td>xxxxxxxxxxxx</td>
               <td>xxxxxxxxx</td>
               <td>
                  <div class="row">
                     {{Form::submit('Edit',['class'=>'btn btn-primary','style'=>'margin-right:2%','data-target'=>'#editcourse', 'data-toggle'=>'modal'])}}

                     {{Form::open(array('url' => '/'))}}
                     {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return confirm("Delete or not?");'])}}
                     {{Form::close()}}
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>


<div class="section BG3" id="section">
   <div class="container">
      <div class="row" style="margin-top: 5%;">
         <div class="col">
            <h1>Grade</h1>
         </div>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Student ID</th>
               <th scope="col">Name</th>
               <th scope="col">Grade</th>
               <th scope="col">Operation</th>
            </tr>
         </thead>

         <tbody>
            <tr>
               <th scope="row">xxxxxx</th>
               <td>xxxxxxxxxxxx</td>
               <td>xxxxxxxxx</td>
               <td>
                  <div class="row">
                     {{Form::submit('Edit',['class'=>'btn btn-primary','style'=>'margin-right:2%','data-target'=>'#editgrade', 'data-toggle'=>'modal'])}}

                     {{Form::open(array('url' => '/'))}}
                     {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return confirm("Delete or not?");'])}}
                     {{Form::close()}}
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>

<div class="section BG3" id="section">
   <div class="container">
      <div class="row" style="margin-top: 5%;">
         <div class="col">
            <h1>Student</h1>
         </div>
      </div>
      <table class="table table-hover">
         <thead>
            <tr>
               <th scope="col">Student ID</th>
               <th scope="col">Name</th>
               <th scope="col">Lastname</th>
               <th scope="col">Username</th>
               <th scope="col">Phone</th>
               <th scope="col">Gender</th>
               <th scope="col">Grade</th>
               <th scope="col">Operation</th>
            </tr>
         </thead>

         <tbody>
            <tr>
               <th scope="row">xxxxxx</th>
               <td>xxxxxx</td>
               <td>xxxxxxxxxxxx</td>
               <td>xxxxxxx</td>
               <td>xxxxxxx</td>
               <td>xxxxxxxxxxxx</td>
               <td>xxxxxxxxx</td>
               <td>
                  <div class="row">
                     {{Form::open(array('url' => '/'))}}
                     {{Form::submit('Delete',['class'=>'btn btn-danger','onclick'=>'return confirm("Delete or not?");'])}}
                     {{Form::close()}}
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>





<script type="text/javascript">
   var myFullpage = new fullpage('#fullpage', {
      /* sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'], */
      anchors: ['1', '2', '3', '4'],
      navigation: true,
      navigationTooltips: ['Approve', 'Course', 'Grade', 'Student'],
      showActiveTooltip: true,
      menu: '#menu'
   });
</script>
@endsection