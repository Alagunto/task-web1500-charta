@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Харты</div>

                <div class="panel-body">
                    @if(empty($chartas))
                        <h5>Харт ещё нет. <a href="/chartas/create">Создать</a></h5>
                    @else
                        <h5>Найдено: {{ count($chartas) }}шт.</h5>
                        <ul>
                            @foreach($chartas as $charta)
                                <li><a href="/charta/{{ $charta->id }}">{{ $charta->title }} </a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
