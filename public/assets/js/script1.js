$(document).ready(function(){
    $('#add_more').click(function(e){
        e.preventDefault();
        $('#add_div').append('<div id = "single"><br><input type = "file" name = "file_upload[]" id = "file_upload"> <a href="javascript:void(0);" class = "_remove_"style = "text-decoration: none; border: 4px turquoise;background-color: #bcdff1; padding:4px; color: black"> Remove </div>');
    });
    $('#add_div').on('click','._remove_',function(){
        $(this).parent("div").remove();
    })
    $('.validate').submit(function(e){

        $('.validate').each(function(){
            if($(this).val() == "") {
                $('.validate_error').html('<p style = "color:red;"> Required Field');
                return false;
            }

            else{
                $('.validate_error').html('<p style = "color:green;"> Fields filled');
                return true;
            }

        });

    });
})