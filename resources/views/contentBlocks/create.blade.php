@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Nieuwe content block aanmaken</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('content-blocks.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Titel</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Titel">
                        </div>
                        <div class="form-group">
                            <label>Interne referentie</label>
                            <input type="text" class="form-control" name="internal_name" id="internal_name" placeholder="Interne referentie">
                        </div>
                        <div class="form-group">
                            <label>Tekst</label>
                            <div>
                                <textarea class="form-control" name="description" id="description" rows="9"></textarea>
                            </div>
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