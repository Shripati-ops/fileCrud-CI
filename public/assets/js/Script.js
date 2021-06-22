$(document).ready(function(){
    var div_count =0;
    $('#add_more').click(function(e){
        e.preventDefault();
        if(div_count >= 0) {
            $('#add_div').append('<div id = "single"><br><input type = "file" name = "file_upload[]" id = "file_upload"> <a href="javascript:void(0);" class = "_remove_"style = "text-decoration: none; border: 4px turquoise;background-color: #bcdff1; padding:4px; color: black"> Remove </div>');
            div_count++;
        }
        if(div_count >= 3){
            $('#add_more').prop('disabled',true);
        }

    });
    $('#add_div').on('click','._remove_',function(){
        $(this).parent("div").remove();
        div_count--;
        if(div_count == 0 || div_count >=2){
            $('#add_more').prop('disabled',false);
        }
    });


    $('#uname').keyup(function(){
        if($('#uname').val() == ''){
            $('#uname').attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
            $('#uname_error').html('<p style = "color:red;"> Please Enter your name');
            return false;
        }else {
            $('#uname').attr('style', "border-radius: 5px; border:green 1px solid;");
            $('#uname_error').html('<p style = "color:green;"> Name Entered');
            return true;
        }
    });
    $('#location').keyup(function(){
        if($('#location').val() == '') {
            $('#location').attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
            $('#location_error').html('<p style = "color:red"> Please Enter the location you live in');
            return false;
        }else{
            $('#location').attr('style', "border-radius: 5px; border:green 1px solid;");
            $('#location_error').html('<p style = "color:green;"> Location Has been entered');
        }
    });
    $('#file_upload').change(function(){
        if ($('#file_upload').get(0).files.length == 0) {
            $('#file_error').html('<p style = "color:red;"> Please Upload a file');
            return false;
        }
        else {
            $('#file_error').html('<p style = "color:green;"> file(s) selected');
            return true;
        }
    });
    $('#email').keyup(function(){
        if($('#email').val() == ''){
            $('#email').attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
            $('#sp1').html('<p style = "color:red"> Email Address Is required');
            return false;
        }
        var email_to_validate = $('#email').val();
        if(!validateEmail(email_to_validate)){
            $('#email').attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
            $('#sp1').html('<p style = "color:red"> Email is missing @ or . kindly fill the email address field properly');
            return false;
        }
        else{
            $('#email').attr('style', "border-radius: 5px; border:green 1px solid;");
            $('#sp1').html('<p style = "color:green"> Email Address has been Added');
            return true;
        }
    });
    $('input[name="Gender"]').change(function(){
        if($('input[name = "Gender"]:checked').length == 0){
            $('#errMsg').html('<p style = "color:red;"> Please Select a Value');
            return false;
        }
        $('#errMsg').html('<p style = "color:green;">Option Selected');
        return true;
    });
    $('input[type="checkbox"]').change(function(){
        if($('input[type=checkbox]:checked').length == 0){
            $('#errMsg1').html('<p style = "color:red;"> Please Check a Value');
            return false;
        }
        else{
            $('#errMsg1').html('<p style = "color:green;">Checkbox Checked');
            return true;
        }
    });
    $('.update').click(function(e){
        if(!confirm("Are you sure You want to update the record?")){
            return false;
        }
        else{
            return true;
        }
    });
    $('.delete').click(function(e){
        if(!confirm("Are you sure You want to delete the record?")){
            return false;
        }
        else{
            return true;
        }
    });
    $('#submit').click (function(e){

     var username = $('#uname').val();
     var location = $('#location').val();
     var email = $('#email').val();
     if(username == ''){
             $('#uname').attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
             $('#uname_error').html('<p style = "color:red"> Please Enter your name');
             return false;
    }
    if(location == ''){
        $('#location').attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
        $('#location_error').html('<p style = "color:red"> Please Enter the location you live in');
        return false;
    }
        if ($('#file_upload').get(0).files.length == 0) {
            $('#file_error').html('<p style = "color:red;"> Please Upload a file');
            return false;
        }
    if(email == ''){
             $('#email').attr('style', "border-radius: 5px; border:#FF0000 1px solid;");
             $('#sp1').html('<p style = "color:red"> Email Address Is required');
             return false;
     }
        if(!validateEmail(email)){
            $('#sp1').html('<p style = "color:red;"> Your Email is missing @ symbol or the . symbol please enter the email correctly');
             return false;
        }
    if($('input[name="Gender"]:checked').length == 0){
            $('#errMsg').html('<p style = "color:red;"> Please Select a Value');
            return false;
    }

    var valid = true;
    if($('input[type=checkbox]:checked').length == 0){
        $('#errMsg1').html('<p style = "color:red;"> Please Check a Value');
        return false;
        }
    else{
        $('#errMsg1').remove();
        return true;
    }
        e.preventDefault();
  });
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test( $email );
    }
});