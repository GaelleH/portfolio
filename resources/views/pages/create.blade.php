@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Nieuwe pagina aanmaken</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pages.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Titel</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Titel">
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug" placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label>Tekst</label>
                            <div>
                                    <textarea class="form-control" id="summary-ckeditor" name="text"></textarea>
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