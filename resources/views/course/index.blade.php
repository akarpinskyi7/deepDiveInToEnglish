@extends('layouts.admin')
@section('content')
    <div  class="container-fluid wrapper4 plan_in Palatino ">
        <div class="row">

            @foreach($courses as $course)

            @if($loop->odd)

            <div class="col-3 my-5 ml-auto text-center" id="img11">
                <img src="{{$course->img}}">
            </div>
            <div class="col-3 my-5 mr-auto" >
                <p class="descr text-left" id="p1">{{$course->describe}}</p>
                <a href="{{route('course.edit',$course->id)}}" class="btn btn-outline-primary">Редагувати</a>
            </div>

            @else

            <div class="col-3 my-5 ml-auto text-center" id="img12">
                <img src="{{$course->img}}">
            </div>
            <div class="col-3 my-5 mr-auto text-left">
                <p class="descr text-left"  id="p2">{{$course->describe}}</p>
                <a href="{{route('course.edit',$course->id)}}" class="btn btn-outline-primary">Редагувати</a>
            </div>

                @endif

                @endforeach

        </div>
       </div>

    </div>

    @endsection
