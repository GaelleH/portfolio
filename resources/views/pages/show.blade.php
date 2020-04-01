@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Pagina - {{ $page->title }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <h5><strong>Titel</strong></h5>
                        <div>
                            <span>{{ $page->title }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                            <h5><strong>Slug</strong></h5>
                            <div>
                                <span>{{ $page->slug }}</span>
                            </div>
                        </div>
                    <div class="form-group">
                        <h5><strong>Omschrijving</strong></h5>
                        <div>
                            <span>{!!$page->text!!}</span>
                        </div>
                    </div>

                    <a href="{{ route('pages.index')}}" class="btn btn-primary btn-fill">Terug</a>
                    <a href="{{ $page->id }}/edit" class="btn btn-info btn-fill">Edit</a>
                    <form method="POST" action="{{ route('pages.destroy', $page->id) }}">
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