<script>
    function showDescription()
    {
        var selectBox = document.getElementById('record_type');
        var userInput = selectBox.options[selectBox.selectedIndex].value;
        if(userInput == 'bad_record')
        {
            document.getElementById('bad_deed').style.visibility='visible';
        }else{
            document.getElementById('bad_deed').style.visibility='hidden';
        }
        return false;
    }
</script>