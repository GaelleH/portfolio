@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Setting - {{ $setting->name }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <h5><strong>Naam</strong></h5>
                        <div>
                            <span>{{ $setting->name }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5><strong>Waarde</strong></h5>
                        <div>
                            <span>{{ $setting->value }}</span>
                        </div>
                    </div>

                    <a href="{{ route('settings.index')}}" class="btn btn-primary btn-fill">Terug</a>
                    <a href="{{ $setting->id }}/edit" class="btn btn-info btn-fill">Edit</a>
                    <form method="POST" action="{{ route('settings.destroy', $setting->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger btn-fill">Delete</button>
                    </form>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection