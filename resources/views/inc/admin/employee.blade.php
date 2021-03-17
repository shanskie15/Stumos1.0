<script type="text/javascript">
$(document).ready(function(){
  $('#employeesTable').DataTable(
    {
      "columns": [
            { "data": "idnumber" },
            { "data": "name" },
            { "data": "email" },
            { "data": "type" },
            { "data": "actions" },
        ]
    }
  );
  var table = $('#employeesTable').DataTable();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
});

function viewEmployee(id)
{
    $.get("{{url('employee')}}/"+id,function(data,status){
    $('#bigModalLabel').html('Employee Information');
    $('#bigModalBody').html(data);
    $('#saveBig').hide();
    $('#cancelBig').hide();
    });
}
</script>
