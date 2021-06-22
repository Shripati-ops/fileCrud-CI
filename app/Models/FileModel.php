<?php
 
 namespace App\Models;

 use CodeIgniter\Model;

 class FileModel extends Model{

    protected $table = 'ciusers';

    protected $primaryKey = 'id';

    protected $allowedFields = ['Name','Location','Email','Gender','Hobbies'];
 }
