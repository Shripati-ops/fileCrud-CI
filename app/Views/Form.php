<html>
    <head> 
        
</head>
<body>
<?php csrf_field(); ?>
<script src = "https://code.jquery.com/jquery-3.6.0.min.js">
</script>
<script src = "<?php echo base_url('/assets/js/Script.js');?>">
</script>
<div class = "validate">
        <form method="post"  action = "/created" enctype="multipart/form-data">
       Enter your username <input type = "text" name ="Username" id = "uname"/>
       <div id = "uname_error">
       </div>
        <br>
        <br>
        Enter Your Location <input type = "text" name = "Location" id = "location" />
        <div id = 'location_error'>
        </div>
        <br>
        <br>
        Choose a File to Upload <input type = "file" name="file_upload[]" id = "file_upload"  />
            <button id = "add_more"> Add more </button>
            <div id = "add_div">
            </div>
            <div id = "remove_div">
            </div>
        <div id = 'file_error'>
        </div>
        <br>
        <br>
        Enter your Email<input type ="text" name = "email" id="email"/>
        <span id = "sp1">
        </span>
        <br>
        <br>

        Enter your Gender<input type = "radio" name="Gender" value ="Male"> Male
        <input type = "radio" name="Gender" value="Female" > Female
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
</form>
</div>
</body>
</html>