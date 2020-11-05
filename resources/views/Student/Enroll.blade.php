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
            <tr>
               <th scope="row">xxxxxx</th>
               <td>xxxxxxxxxxxx</td>
               <td>xxxxxxxxx</td>
               <td>
                  <div class="row">
                     {{Form::open(array('url' => '/'))}}
                     {{Form::submit('Add Course to list',['class'=>'btn btn-primary'])}}
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
      anchors: ['firstPage', 'secondPage'],
      navigation: true,
      navigationTooltips: ['Course'],
      showActiveTooltip: true,
      menu: '#menu'
   });
</script>
@endsection