<html>
    <head> 
    </head>
        <body>
        </head>
<?php csrf_field(); ?>
<script src = "https://code.jquery.com/jquery-3.6.0.min.js">
</script>

        <script src = "<?php echo base_url('/assets/js/Script.js');?>">
        </script>

        <form method="post" action = "/update"  enctype="multipart/form-data">
       <?php foreach($pre_load as $pl): ?>
       <input type = "hidden" name = "id" value = <?php echo intval($id);?>>
        <input type = "hidden" name = "fid" value = <?php echo intval($fileId);?>>
       Enter your username <input type = "text" name ="Username" id = "uname" value = <?php echo $pl['Name']?>>
       <div id = "uname_error">
       </div>
        <br>
        <br>
        Enter Your Location <input type = "text" name = "Location" id = "location" value = <?php echo $pl['Location']?>>
        <div id = 'location_error'>
        </div>
        <br>
        <br>
            Choose a File to Upload <input type = "file" name="file_upload[]" id = "file_upload"/>
            <button id = "add_more"> Add more </button>
            <div id = "add_div">
            </div>
            <div id = "remove_div">
            </div>
            <div id = 'file_error'>
            </div>
        Enter your Email<input type ="email" name = "Email" id="email" value = <?php echo $pl['Email']?> >
        <span id = "sp1">
        </span>
        <br>
        <br>
            <?php if ($pl['Gender'] =='Male'):?>
        Enter your Gender<input type = "radio" name="Gender" value ="Male" checked> Male
                <input type = "radio" name="Gender" value="Female"> Female
            <?php else:?>
        <input type = "radio" name="Gender" value="Female" checked> Female
                <input type = "radio" name="Gender" value="Female"> Male
            <?php endif;?>

        <div id = "errMsg">

        </div>
        <br>
        <br>
        Please select your hobbies:- <input type ="checkbox" name = "hobbies[]" value ="Coding" id = "hobbies"> Coding
        <input type ="checkbox" name = "hobbies[]" value ="Cooking" id = "hobbies"> Cooking
        <input type ="checkbox" name = "hobbies[]" value ="Gaming" id = "hobbies"> Gaming
        <input type ="checkbox" name = "hobbies[]" value ="Reading" id = "hobbies"> Reading
        <div id = "errMsg1">

</div>
        <button type = "submit" id ="submit"> Submit this information      
        <?php endforeach?>
</form>
</body>
</html>
