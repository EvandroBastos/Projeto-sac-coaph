@extends('layouts.app')


@section('content')

<style>
    html, body {
        background-color:#F8F8FF;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
</style>

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('presencials.update', $presencial->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                    @include('presencials.form')
            </form>
        </div>
    </div>


@endsection
