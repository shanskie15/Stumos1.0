<script>
$(document).ready(function(){
  $('#employeesTable').DataTable(
    {
      "columns": [
            { "data": "name" },
            { "data": "email" },
            { "data": "type" },
            { "data": "action" },
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
</script>