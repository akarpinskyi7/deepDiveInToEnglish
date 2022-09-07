@extends('layouts.admin')
@section('content')

    <form action="{{route('feedback.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('feedback.form')
    </form>
@endsection

