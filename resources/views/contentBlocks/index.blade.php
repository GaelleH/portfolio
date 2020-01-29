@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-group col-md-6">
                <h5>Start Date <span class="text-danger"></span></h5>
                <div class="controls">
                    <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="Please select start date"> <div class="help-block"></div>
                </div>
            </div>
            <div class="form-group col-md-6">
                <h5>End Date <span class="text-danger"></span></h5>
                <div class="controls">
                    <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="Please select end date"> <div class="help-block"></div>
                </div>
            </div>
            <div class="col-md-4 text-left">
                <button type="text" id="btnFiterSubmitSearch" class="btn btn-primary">Submit</button>
            </div>
            <table class="table tablesorter" id="laravel_datatable">
                <thead class=" text-primary">
                    <tr>
                        <th scope="col">{{ 'Id' }}</th>
                        <th scope="col">{{ 'Voornaam' }}</th>
                        <th scope="col">{{ 'Naam' }}</th>
                        <th scope="col">{{ 'Email' }}</th>
                        <th scope="col">{{ 'Created at' }}</th>
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
          url: "{{ url('clients-list') }}",
          type: 'GET',
          data: function (d) {
          d.start_date = $('#start_date').val();
          d.end_date = $('#end_date').val();
          }
         },
         columns: [
                  { data: 'id', name: 'id' },
                  { data: 'first_name', name: 'first_name' },
                  { data: 'last_name', name: 'last_name' },
                  { data: 'email', name: 'email' },
                  { data: 'created_at', name: 'created_at' },
                  { data: 'action', name: 'action', orderable: false }
               ]
      });
   });
 
  $('#btnFiterSubmitSearch').click(function(){
     $('#laravel_datatable').DataTable().draw(true);
  });
</script>
@endsection