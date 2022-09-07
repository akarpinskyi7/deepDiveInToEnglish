@extends('layouts.admin')
@section('content')
    <form action="{{route('client.update',$client->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Імя</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{$client->name}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Прізвище</label>
            <input type="text" name="surname" class="form-control" id="exampleFormControlInput1" value="{{$client->surname}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{$client->email}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Телефон</label>
            <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" value="{{$client->phone}}">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Місто</label>
    <input type="text" name="city" class="form-control" id="exampleFormControlInput1" value="{{$client->city}}">
</div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
