@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-group">
            <a href="{{ route('welcome') }}" class="button button-small button-accent"><i class="fa fa-arrow-left" aria-hidden="true"></i> Terug</a>
        </div>
        <h1>{{ $page->title }}</h1>
        <p>{!!$page->text!!}</p>
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <p style="font-size: 12px;color:white;">
                        Copyright <a style="color:white;" href="{{ route('login') }}">Gaëlle Hardy</a> 2020
                    </p>
                </div>
                <div class="col-md-2">
                    <p style="font-size: 12px;color:white;">
                        <a class="navbar-nav mr-auto" style="color:white;" href="{{ url('/page/'. $privacyPolicy->id) }}">Privacy beleid</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
@endsection
