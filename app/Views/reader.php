<?php echo "<table border = '3px'>";?>
<?php echo "<tr>"; ?>
<?php echo "
<th> Name </th>
<th> Location </th>
<th> Email </th>
<th> Gender </th>
<th> Hobbies </th>
<th> Image/file Uploaded </th>
<th> Update Data?</th>
<th> Delete </th>

";
?> 
<body>
<script src = "https://code.jquery.com/jquery-3.6.0.min.js">
</script>
<script src = "<?php echo base_url('/assets/js/Script.js');?>">
</script>
<?php
 foreach($users as $user){
     $table_vals = "<tr>".
     "<td>". $user['Name']. "</td>".
     "<td>". $user['Location']."</td>".
     "<td>". $user['Email']. "</td>".
     "<td>". $user['Gender']."</td>".
     "<td>". $user['Hobbies']."</td>".
     "<td>". $user['FileName']."</td>".
     "<td>".'<a class = "update" href='.'http://localhost:8080/'.'update_form'.'?id='.$user['ID'].'&fileID='.$user['FileID'].'>'."Update"."</td>".
     "<td>".'<a class = "delete" href='.'http://localhost:8080/'.'delete'.'?id='.$user['ID'].'>'."Delete"."</td>".
     "</tr>";
     print_r($table_vals);
 } 



 ?>
    
</body>