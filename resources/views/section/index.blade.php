@extends("layouts.app")

@section("content")
   <div class="box container">
        <div class="box-header with-border">
          <h3 class="box-title">All Section</h3>

          <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> -->
        </div>

        <div class="box-body">

         
          <a href="{{ route('section.create') }}" class="btn btn-success">Create Section</a>

          <hr>

          <table class="table table-bordered" id="section-table">
            <thead>
              <tr>
                  
                  <th>Name</th>
                  <th>Grade</th>
                  <th></th>
                  <th></th>
                  
              </tr>
          </thead>
        </table>  
      </div>
      
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
@stop
@push('scripts')
<script>
$(function() {
    $('#section-table').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '{!! route('section.data') !!}',
        columns: [
            
            { data: 'name', name: 'name'},
            { data: 'grade', name: 'grade'},
            { data: 'edit', name: 'edit'},
            { data: 'delete', name: 'delete'},
            
        ]
    });
});
</script>
@endpush