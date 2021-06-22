<?php
 
 namespace App\Models;

 use CodeIgniter\Model;

 class ImageModel extends Model{

    protected $table = 'file';

    protected $primaryKey = 'fileid';

    protected $allowedFields = ['FileName','ID'];
 }
 ?>