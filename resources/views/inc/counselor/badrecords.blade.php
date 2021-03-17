<script type="text/javascript">
    $(document).ready(function(){
        $('#studentTable').DataTable(
        {
            "columns": [
                { "data": "Bad Record Type" },
                { "data": "Date Created" },
                { "data": "Student ID" },
                { "data": "Created By" },
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
        function deleteEmployee(id,elem)
          {
            swal("Do you want to remove employee from database?", {
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
          function viewDesc(id)
          {
            $.get("{{url('counselor')}}/"+id,function(data,status){
              $('#bigModalLabel').html('Record Information');
              $('#bigModalBody').html(data);
              $('#saveBig').hide();
              $('#cancelBig').hide();
            });
          }
        </script>