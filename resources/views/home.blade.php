@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Созданные вами харты</div>

                <div class="panel-body">
                    @if(!auth()->user()->chartas()->count())
                        <h5>Харт ещё не создано. <a href="/chartas/create">Создать</a></h5>
                    @else
                        <ul>
                        @foreach(auth()->user()->chartas as $charta)
                                <li><a href="/charta/{{ $charta->id }}">{{ $charta->title}}</a></li>
                        @endforeach
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
