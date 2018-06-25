@extends("layouts.app")

@section("content")
   <div class="box container">
        <div class="box-header with-border">
          <h3 class="box-title">All Student</h3>

          <!-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> -->
        </div>
        <div class="box-body">

         
            <a href="{{ url('student/create') }}" class="btn btn-success btn-sm"> 
            <i class="fa fa-plus"></i> create new student</a>

            <select name="grade-filter" id="grade-filter">
                <option value="">Choose Grade</option>
                @foreach($grades as $key=>$value)
                  <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>

              <select name="section-filter" id="section-filter">
                <option value="">Choose Section</option>
                @foreach($sections as $key=>$value)
                  <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
              </select>
         

          <hr>

           <table class="table table-bordered" id="student-table">
            <thead>
              <tr>
                  <th>Name</th>
                  <th>Father Name</th>
                  <th>Address</th>
                  <th>Phone Number</th>
                  <th>Grade</th>
                  <th>Section</th>
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
    $('#student-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('student.data') !!}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'father_name', name: 'father_name' },
            { data: 'address', name: 'address' },
            { data: 'phone_no', name: 'phone_no' },
            { data: 'grade', name: 'grade' },
            { data: 'section', name: 'section' },
            { data: 'edit', name: 'edit' },
            { data: 'delete', name: 'delete' },
            

        ]
    });
});

</script>

<script>
  
  $(document).ready(function() 
  {
    $("#grade-filter").on('change', function() 
    {
      var my = $(this).val();
      if(my) {
        $.ajax({
          url: '/grades/' + my,
          type: "GET",
          dataType: "json",
          success: function(result) 
          {
            $("#student-table").empty();
            $("#student-table").append("<tr><th>Name</th><th>Father Name</th><th>Address</th><th>Phone Number</th></tr>");
            $.each(result,function(key,value)
            {
            	$("#student-table").append("<tr><td>"+value.name+"</td><td>"+value.father_name+"</td><td>"+value.address+"</td><td>"+value.phone_no+"</td></tr>");
            });

            // console.log(result);

            
          },       
        });
      }
    });
  });

</script>

<script>
  
  $(document).ready(function() 
  {
    $("#section-filter").on('change', function() 
    {
      var my = $(this).val();
      if(my) {
        $.ajax({
          url: '/stu-sections/' + my,
          type: "GET",
          dataType: "json",
          success: function(result) 
          {
            $("#student-table").empty();
            $("#student-table").append("<tr><th>Name</th><th>Father Name</th><th>Address</th><th>Phone Number</th></tr>");
            $.each(result,function(key,value)
            {
            	$("#student-table").append("<tr><td>"+value.name+"</td><td>"+value.father_name+"</td><td>"+value.address+"</td><td>"+value.phone_no+"</td></tr>");
            });

            // console.log(result);

            
          },       
        });
      }
    });
  });

</script>
@endpush