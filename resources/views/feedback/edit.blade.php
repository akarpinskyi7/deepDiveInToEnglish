@extends('layouts.admin')
@section('content')

    <form action="{{route('feedback.update',$feedback->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('feedback.form')
{{--        <div class="form-group">--}}
{{--            <label for="exampleFormControlInput1">Автор</label>--}}
{{--            <input type="text" name="author" class="form-control" id="exampleFormControlInput1" value="{{$feedback->author ?? ''}}">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="exampleFormControlInput1">Опис</label>--}}
{{--            <textarea name="describe" rows="5" class="form-control" required>{{$feedback->describe ?? ''}}</textarea>--}}
{{--        </div>--}}
{{--        <input type="file" name="img">--}}
{{--        <button type="submit" class="btn btn-primary">Submit</button>--}}
    </form>
@endsection
