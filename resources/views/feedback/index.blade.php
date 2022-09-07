@extends('layouts.admin')
@section('content')
    <div class="add-new">
        <p><b>Новий відгук</b></p>
        <button class="btn btn-primary" id="button">Створити</button>

        <div id="popup">

            <form action="{{route('feedback.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Автор</label>
                    <input type="text" name="author" class="form-control" id="exampleFormControlInput1" value="{{$feedback->author ?? ''}}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput2">Опис</label>
                    <textarea name="describe" rows="5" class="form-control" id="exampleFormControlInput2" required>{{$feedback->describe ?? ''}}</textarea>
                </div>
                <input type="file" name="img" class="last-input">
                <button type="submit" class="btn btn-success">Додати</button>
            </form>

        </div>

    </div>

    <div class="container-fluid">
        @foreach($feedbacks as $feedback)

            @if($loop->odd)

        <div class="row">
            <div class="col-5 m-auto">
                <img src="{{$feedback->img ?? 'https://intita.com/images/mainpage/intitaLogo.jpg'}}" width="100%">
            </div>

            <div class="col-1 m-auto">
                <p>{{$feedback->author}}</p>
            </div>
            <div class="col-4 m-auto">
                <p class="descr" id="p1">{{$feedback->describe}}</p>
            </div>
            <div class="col-2 m-auto edit-sec">
                <a href="{{route('feedback.edit',$feedback->id)}}" class="btn btn-outline-primary">Редагувати</a>
                <form action="{{route('feedback.destroy',$feedback->id)}} " method="post" enctype="multipart/form-data"
                >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Видалити</button>
                </form>
            </div>
        </div>

            @else

                <div class="row ">
                    <div class="col-2 m-auto edit-sec">
                        <a href="{{route('feedback.edit',$feedback->id)}}" class="btn btn-outline-primary">Редагувати</a>
                        <form action="{{route('feedback.destroy',$feedback->id)}} " method="post" enctype="multipart/form-data"
                              onsubmit=" if (confirm('Бажаєте видалити?'))  { return true} else { return false}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Видалити</button>
                        </form>
                    </div>
                    <div class="col-4 m-auto">
                        <p class="descr" id="p1">{{$feedback->describe}}</p>
                    </div>
                    <div class="col-1 m-auto">
                        <p>{{$feedback->author}}</p>
                    </div>
                    <div class="col-5 m-auto">
                        <img src="{{$feedback->img ?? 'https://intita.com/images/mainpage/intitaLogo.jpg'}}" width="100%">
                    </div>
                </div>

                @endif
            @endforeach
    </div>



    <script>
        $("#button").click(function() {
            $("#popup").toggle();
        });
    </script>

@endsection
