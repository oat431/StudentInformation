@extends('Master.master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            {{-- <th scope="col">phone</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th> --}}
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
            <th scope="row">{{$item->student_id}}</th>
            <td>{{$item->student_name}}</td>
            <td>{{$item->email}}</td>
            {{-- <td>{{$item->student_phone}}</td>
            <td>{{$item->gender}}</td>
            <td>{{$item->birthdate}}</td> --}}
            <td><a href="{{ route('admin.show',$item->student_id) }}">grade</a></td>
          </tr>
            @endforeach
            {{-- {{ route('admin.destroy',['id'=>$item->id])}} --}}
        </tbody>
    </table>
</body>
</html>
@endsection
