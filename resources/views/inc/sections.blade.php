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
// View employee
  function viewEmployee(id)
  {
    console.log('ID',id)
    $(document).ready(function(){
      console.log('URL',"{{url('section')}}/"+id)
      $.get("{{url('section')}}/"+id, function(data,status){
        $('#bigModalLabel').html('Section Information');
        $('#bigModalBody').html(data);
        $('#saveBig').hide();
        $('#cancelBig').hide();
      });
    });
  }
  // Show errors
  function showErrors(errors)
  {
    $.each(errors,function(key, value){
      if(true == value.includes('firstname')){
        alertError('#firstname',value);
      }
      if(true == value.includes('middlename')){
        alertError('#middlename',value);
      }
      if(true == value.includes('lastname')){
        alertError('#lastname',value);
      }
      if(true == value.includes('email')){
        alertError('#email',value);
      }
      if(true == value.includes('birth date')){
        alertError('#birth_date',value);
      }
      if(true == value.includes('contact')){
        alertError('#contact',value);
      }
      if(true == value.includes('address') && false == value.includes('email')){
        alertError('#address',value);
      }
      if(true == value.includes('position')){
        alertError('#position',value);
      }
      if(true == value.includes('salary')){
        alertError('#salary',value);
      }
    });
    // alert error
    function alertError(elem,value)
    {
      $(elem).addClass('is-invalid');
      $(elem).next('span').children('strong').html(value);
    }
  }
  // Reset errors
  function resetErrors()
  {
    $('input').each(function(){
      $(this).removeClass('is-invalid');
    });
  }
  // capitalize first letters
  function toTitleCase(str) {
    return str.replace(/\w\S*/g, function(txt){
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
  }
  // edit employee
  function editSection(id,elem)
  {
    $.get("{{url('section')}}/"+id+"/edit",function(data,status){
      $('#bigModalLabel').html('Edit section');
      $('#bigModalBody').html(data);
      $('#saveBig').show();
      $('#cancelBig').show();
      $('#saveBig').unbind();
      $('#saveBig').on('click',function(){
        if(null == elem){
          elem = findElem(id);
        }
        updateSection(id,elem);
      });
    });
  }
  // find elem of employee record
  function findElem(id)
  {
    var row;
    table.rows().eq(0).each( function (index) {
      if($(table.row(index).node()).attr('id') == id){
        row = table.row(index).node();
      }
    });
    return $(row).children('td').get(0);
  }
  // update employee in the database
  function updateEmployee(id,elem)
  {
    var employee = getData();
    alert(JSON.stringify(employee));
    resetErrors();
    $.ajax({
      url: "{{url('employees')}}/"+id,
      type: 'PUT',
      data: employee,
      success:function(result){
        if('invalid' == result.status){
          showErrors(result.errors);
        }else if('success' == result.status){
          updateRow();
          swal('Success',result.message,'success');
          $('#cancelBig').click();
        }
      }
    });
    // update row in table
    function updateRow()
    {
      table.row($(elem).parents('tr')).data(fillRowData(employee,id)).invalidate().draw();
    }

  }
  // get employee data
  function getData()
  {
    var section = {
      section_name : toTitleCase($('#section_name').val()),
      room_number : toTitleCase($('#room_number').val()),
      user_id : $('#user_id').val(),
    };

    return section;
  }

</script>