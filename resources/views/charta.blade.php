@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $charta->title }} <br />

                    <small><a href="/chartas">&larr; к списку харт</a></small>
                </div>

                <div class="panel-body">
                    <?php echo $charta->text; ?>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Подписавшие
                </div>

                <div class="panel-body">
                    @if(!$charta->signs()->count())
                        Никто
                    @else
                        <ul>
                            @foreach($charta->signs as $sign)
                                <li>
                                    {{ $sign->user->name }} в {{ $sign->created_at }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <hr />

                    @if(auth()->check())
                        @if($charta->signs()->where("user_id", auth()->id())->count() == 0)
                            <a href="/charta/{{ $charta->id }}/sign">Подписать</a>
                        @else
                            <b>Вы подписали</b>
                        @endif
                    @endif
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    Жалобы
                </div>
                <div>
                    <div class="panel-body">
                        @if(!$charta->reports()->count())
                            Никто не жаловался
                        @else
                            <ul>
                                @foreach($charta->reports as $report)
                                    <li>
                                        <kbd>
                                            {{ substr(json_encode((string)$report->name), 1, -1) }}</kbd>: {{ $report->text }} в {{ $report->created_at }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <hr />
                        @if(auth()->check())
                            <h5>Оставить жалобу</h5>
                            <form action="/charta/{{ $charta->id }}/report" method="GET">
                                <label>
                                    Пожалуйста, укажите ваше имя: <br />
                                    <input type="text" placeholder="Ваше имя" name="name" /> <br />
                                    <small>Мы храним его в секрете, оно будет тщательно зашифровано</small><br />
                                </label> <br />
                                <label>
                                    Текст жалобы: <span style="color: red; font-size: 0.8em;">обязательно</span> <br />
                                    <input type="text" placeholder="Ересь!" name="text" />
                                </label>
                                <input type="submit" value="Пожаловаться" />
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
