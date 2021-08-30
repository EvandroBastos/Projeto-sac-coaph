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
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('presencials.store') }}">
                {{ csrf_field() }}
                @include('presencials.form')
    </form>
    @include('sweetalert::alert')
@endsection
