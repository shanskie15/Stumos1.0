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

function deleteSection(id,elem)
  {
    swal("Do you want to remove section from database?", {
      buttons: {
        cancel: "Cancel",
        catch: {
          text: "No",
          value: "soft",
        },
        defeat: {
          text: "Yes",
          value: "hard"
        }
      },
    })
    .then((value) => {
      switch (value) {
    
        case "soft":
          removeSection("{{url('section/soft')}}/"+id,elem);
          
          break;
    
        case "hard":
          removeSection("{{url('section')}}/"+id,elem);
          break;
        default:;
      }
    });
    function removeSection(url)
    {
      $.ajax({
        url: url,
        type: 'DELETE',
        success:function(result){
          if('success' == result.status){
            swal(result.message, {
              icon: "success",
            });
            table.row($(elem).parents('tr')).remove().draw();
          }else{
            swal('Error',result.message,'error');
          }
        }
      });

    }
  }
</script>