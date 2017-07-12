@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Отладка</div>

                <div class="panel-body">
                    <form method="POST">
                        {!! csrf_field() !!}
                        <input type="text" name="include" placeholder="what to include" />
                        <input type="submit" value="include_once" /> <br />
                        <small>Note: you can only include pages of this site</small>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
