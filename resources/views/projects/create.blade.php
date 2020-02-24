@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Nieuw project aanmaken</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('projects.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Titel</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Titel">
                        </div>
                        <div class="form-group">
                            <label>Tekst</label>
                            <div>
                                <textarea class="form-control" name="description" id="description" rows="9"></textarea>
                            </div>
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

      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $(".btn-danger").on("click",function(){ 
          $(this).parents(".control-group").remove();
      });

    });

</script>
@endsection