@extends('layouts.admin')
@section('content')

    <div class="search-container">
        <form class="form-inline my-2 my-lg-2 " action="{{route('client.index')}}">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search..."
                   aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div>
            @if(isset($_GET['search']))
                @if(count($clients)>0)
                    <p class="">Результати по запиту <i>" <?=htmlspecialchars($_GET['search'])?> "</i></p>
                    <p class="">Знайдено: {{count($clients)}}</p>
                @else
                    <p>Результатів по запиту <i>" <?=htmlspecialchars($_GET['search'])?> "</i> не знайдено :(</p>
                    <a class="btn btn-outline-info my-2 my-sm-0" href="{{route('client.index')}}">Показати усіх</a><br>
                @endif
            @endif
        </div>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">№</th>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">City</th>
            <th scope="col">Created</th>
            <th scope="col">Редагувати</th>
            <th scope="col">Видалити</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <th scope="row">{{$loop->iteration}}
                </th>
                <td>{{$client->name}}</td>
                <td>{{$client->surname}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->city}}</td>
                <td>{{$client->created_at->format('d/m/Y')}}</td>
                <th>
                    <a href="{{route('client.edit',$client->id)}}" class="btn btn-outline-primary">Редагувати</a>
                </th>
                <th>
                    <form action="{{route('client.destroy',$client->id)}} " method="post" enctype="multipart/form-data" onsubmit=" if (confirm('Бажаєте видалити?'))  { return true} else { return false}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Видалити</button>
                    </form>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
