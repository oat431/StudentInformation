@extends('Master.master')

@section('title','Course Enrollment')

@section('section')
<div class="section BG4" id="section">
   <div class="container">
      <div class="row" style="margin-top: 5%;">
         <div class="col">
            <h1>All Course</h1>
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
            @foreach($courseData as $item);
            <tr>
               <th scope="row">{{$item->course_id}}</th>
               <td>{{$item->course_name}}</td>
               <td>{{$item->credit}}</td>
               <td>
                  <div class="row">
                     <form action="/registration" method="post">
                        @csrf
                        <input type="hidden" name="student_id" value="{{$id}}"/> 
                        <input type="hidden" name="course_id" value="{{$item->course_id}}"/>
                        <input type="submit" class='btn btn-success' value="add course"/>
                     </form>
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
      navigationTooltips: ['Course'],
      showActiveTooltip: true,
      menu: '#menu'
   });
</script>
@endsection