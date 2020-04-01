@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Nieuwe setting aanmaken</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('settings.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Naam</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Naam">
                        </div>
                        <div class="form-group">
                            <label>Waarde</label>
                            <input type="text" class="form-control" name="value" id="value" placeholder="Waarde">
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