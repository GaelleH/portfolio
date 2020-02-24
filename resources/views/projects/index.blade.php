@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <a href="{{ route('projects.create') }}" class="btn btn-sm btn-primary">{{ 'Voeg project toe' }}</a>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table tablesorter" id="laravel_datatable">
                <thead class=" text-primary">
                    <tr>
                        <th scope="col">{{ 'Id' }}</th>
                        <th scope="col">{{ 'Titel' }}</th>
                        <th scope="col">{{ 'Omschrijving' }}</th>
                        <th scope="col">{{ 'Action' }}</th>
                    </tr>
                </thead>
            </table>
            
        </div>
    </div>
</div>
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" defer></script> --}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" defer></script>
<script type="text/javascript">
 $(document).ready( function () {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  $('#laravel_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ url('projects-list') }}",
          type: 'GET',
          data: function (d) {
          }
         },
         columns: [
                  { data: 'id', name: 'id' },
                  { data: 'title', name: 'title' },
                  { data: 'description', name: 'description' },
                  { data: 'action', name: 'action', orderable: false },
               ]
      });
   });
 
  $('#btnFiterSubmitSearch').click(function(){
     $('#laravel_datatable').DataTable().draw(true);
  });
</script>
@endsection