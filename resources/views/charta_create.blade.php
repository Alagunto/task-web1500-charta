@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Создать харту
                </div>
                @if(count($errors))
                    <div class="panel panel-warning">
                        <div class="panel-body">
                            {{ $errors->first() }}
                        </div>
                    </div>
                @endif

                <div class="panel-body">
                    <form method="POST">
                        {!! csrf_field() !!}
                        <label>
                            Название харты: <br />
                            <input type="text" placeholder="Название" name="title" />
                        </label> <br /> <br />
                        <label>
                            Текст харты: <br />
                            <textarea name="text">

                            </textarea>
                        </label> <br />
                        <input type="submit" value="Создать" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5g5faf78gvk6yfq9bd3bbfjo858kjx1q8o0nbiwtygo2e4er"></script>
<script>tinymce.init({ selector:'textarea' });</script>
@endsection
