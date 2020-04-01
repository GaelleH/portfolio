@extends('layouts.app')

@section('content')
<div class="container">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
  
          @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div> 
          @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Setting aanpassen - {{ $setting->name }}</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('settings.update', $setting) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Naam</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Naam" value="{{ $setting->name }}">
                        </div>
                        <div class="form-group">
                            <label>Waarde</label>
                            <input type="text" class="form-control" name="value" id="value" placeholder="Waarde" value="{{ $setting->value }}">
                        </div>
    
                        <button type="submit" class="btn btn-info btn-fill pull-right">Opslaan</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection