@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Project - {{ $project->title }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <h5><strong>Titel</strong></h5>
                        <div>
                            <span>{{ $project->title }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <h5><strong>Omschrijving</strong></h5>
                        <div>
                            <span>{{ $project->description }}</span>
                        </div>
                    </div>
                    <div>
                        @foreach($project->project_images as $projectImage)
                        <img style="width:35%" src="{{ asset('/files/'.$projectImage->project_image_path) }}">
                        @endforeach
                    </div>

                    <a href="{{ route('projects.index')}}" class="btn btn-primary btn-fill">Terug</a>
                    <a href="{{ $project->id }}/edit" class="btn btn-info btn-fill">Edit</a>
                    <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
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