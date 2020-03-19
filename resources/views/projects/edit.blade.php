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
                    <h6>Project aanpassen - {{ $project->title }}</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label>Titel</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Titel" value="{{ $project->title }}">
                        </div>
                        <div class="form-group">
                            <label>Tekst</label>
                            <div>
                                <textarea class="form-control" name="description" id="description" rows="9">{{ $project->description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            @foreach($project->project_images as $projectImage)
                                <div>
                                    <img style="width:25%" src="{{ asset('/files/'.$projectImage->project_image_path) }}">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remove_image[{{$projectImage->id}}]" id="remove_image">
                                        <label class="form-check-label" for="remove_image">
                                            {{ __('Verwijder afbeelding') }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <div class="input-group control-group increment" >
                                <input type="file" name="filename[]" class="form-control">
                                <div class="input-group-btn"> 
                                    <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div>
                            </div>
                            <div class="clone hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                    <input type="file" name="filename[]" class="form-control">
                                    <div class="input-group-btn"> 
                                        <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                </div>
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

<script type="text/javascript">

    $(document).ready(function() {

    //   $(".hide").remove();

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
@endsection