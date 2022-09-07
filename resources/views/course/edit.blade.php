@extends('layouts.admin')
@section('content')

    <form action="{{route('course.update',$course->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Опис</label>
            <input type="text" name="describe" class="form-control" id="exampleFormControlInput1" value="{{$course->describe}}">
        </div>
        <input type="file" name="img">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
