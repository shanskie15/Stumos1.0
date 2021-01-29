<script>
$(document).ready(function(){
  $('#studentTable').DataTable(
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

function deleteStudent(id,elem)
  {
    swal("Do you want to remove student from database?", {
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
          removeStudent("{{url('student/soft')}}/"+id,elem);
          
          break;
    
        case "hard":
          removeStudent("{{url('student')}}/"+id,elem);
          break;
        default:;
      }
    });
    function removeStudent(url)
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
  function viewStudent(id)
  {
    $.get("{{url('student')}}/"+id,function(data,status){
      $('#bigModalLabel').html('Student Information');
      $('#bigModalBody').html(data);
      $('#saveBig').hide();
      $('#cancelBig').hide();

    });
  }
</script>