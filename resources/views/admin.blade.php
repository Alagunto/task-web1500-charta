@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Import</div>

                <div class="panel-body">
                    <form method="POST" action="/admin/import" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <input type="file" name="import" placeholder="Import chartas" />
                        <br />
                        <input type="submit" value="Import" /> <br />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Export</div>

                <div class="panel-body">
                    <form method="POST" action="/admin/export">
                        {!! csrf_field() !!}
                        <input type="submit" value="Export" /> <br />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
