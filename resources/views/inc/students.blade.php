<script>
$(document).ready(function(){
  $('#sectionTable').DataTable(
    {
      "columns": [
            { "data": "Name" },
            { "data": "Year" },
            { "data": "Section" },
            { "data": "Actions" },
        ]
    }
  );
  var table = $('#studentTable').DataTable();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
});
</script>