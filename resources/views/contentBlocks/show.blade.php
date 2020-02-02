@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Content block - {{ $contentBlock->title }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <h5><strong>Titel</strong></h5>
                        <div>
                            <span>{{ $contentBlock->title }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5><strong>Interne referentie</strong></h5>
                        <div>
                            <span>{{ $contentBlock->internal_name }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5><strong>Tekst</strong></h5>
                        <div>
                            <span>{{ $contentBlock->description }}</span>
                        </div>
                    </div>

                    <a href="{{ route('content-blocks.index')}}" class="btn btn-primary btn-fill">Terug</a>
                    <a href="{{ $contentBlock->id }}/edit" class="btn btn-info btn-fill">Edit</a>
                    <form method="POST" action="{{ route('content-blocks.destroy', $contentBlock->id) }}">
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