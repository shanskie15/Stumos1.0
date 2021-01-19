<script>
$(document).ready(function(){
  $('#sectionTable').DataTable(
    {
      "columns": [
            { "data": "section_name" },
            { "data": "room_number" },
            { "data": "user_id" },
            { "data": "actions" },
        ]
    }
  );
  var table = $('#sectionTable').DataTable();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
});
</script>