<script>
    $(document).ready(function(){
      $('#borrowTable').DataTable(
        {
          "columns": [
                { "data": "student_name" },
                { "data": "book_name" },
                { "data": "contact" },
                { "data": "action" },
            ]
        }
      );
      var table = $('#borrowTable').DataTable();
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });
    
    function deleteBorrow(id,elem)
      {
        swal("Do you want to remove borrow from database?", {
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
              removeEmployee("{{url('employees/soft')}}/"+id,elem);
              
              break;
        
            case "hard":
              removeEmployee("{{url('employees')}}/"+id,elem);
              break;
            default:;
          }
        });
        function removeEmployee(url)
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