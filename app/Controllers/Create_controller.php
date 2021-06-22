<?php 

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\FileModel;
use App\Models\ImageModel;



class Create_controller extends BaseController{
  
    public function index(){
        return view("Form.php");
       
    }
    public function create(){
        $fm = new FileModel();
        $im = new ImageModel();
        helper(['form', 'url']);
        $name = $this->request->getPost('Username');
        $location = $this->request->getPost('Location');
        $email = $this->request->getPost('email');
        $gender = $this->request->getPost('Gender');
        $hobbies = $this->request->getPost('hobbies');
        $error_msg = '';
        if($name == ''){
            $data['title'] = "Failure Encountered while uploading your data";
            $error_msg = $error_msg."Data Entered for name is either empty or invalid please retry";
            $data['error_msg'] = $error_msg;
        }
        if($location == '') {
            $data['title'] = "Failure Encountered while uploading your data";
            $error_msg = $error_msg."<br> Data Entered for location is either empty or invalid please retry";
            $data['error_msg'] = $error_msg;
        }
        if($gender == ''){
            $data['title'] = "Failure Encountered while uploading your data";
            $error_msg = $error_msg."<br> You know you have to select a gender right?";
            $data['error_msg'] = $error_msg;
        }

        if($email == ''){
            $data['title'] = "Failure Encountered while uploading your data";
            $error_msg = $error_msg."<br> Don't tell me you don't have an Email ID";
            $data['error_msg'] = $error_msg;
        }
        if($hobbies == ''){
            $data['title'] = "Failure Encountered while uploading your data";
            $error_msg = $error_msg."<br> What! You don't have hobbies? What a lifeless guy!!!";
            $data['error_msg'] = $error_msg;
        }
        else {
            $checked_data = implode(",",$this->request->getPost('hobbies'));
            $fm->save([
                'Name' => $this->request->getPost('Username'),
                'Location' => $this->request->getPost('Location'),
                'Email' => $this->request->getPost('email'),
                'Gender' => $this->request->getPost('Gender'),
                'Hobbies' => $checked_data,
            ]);
            $data['title'] = "Record Added Successfully";
            $data['error_msg'] = "The Form was filled Perfectly";
            $id = $fm->insertID();
        }
       if(count($_FILES['file_upload']) > 0){
           $foldername = ROOTPATH.'public/assets/uploads';
           $counter = 0;
           for($i = 0;$i < count($_FILES['file_upload']['name']); $i++) {
               if($_FILES['file_upload']['name'][$i] <> "") {
                   $arr = explode(".",$_FILES['file_upload']['name'][$i]);
                   $get_ext = strtolower(end($arr));
                   if($get_ext == 'jpg' or $get_ext == 'jpeg' or $get_ext == 'png') {
                       $filePath = $foldername . '/' . $_FILES['file_upload']['name'][$i];
                       if (!move_uploaded_file($_FILES['file_upload']['tmp_name'][$i], $filePath)) {
                           $data['msg'] = 'File not moved';
                           $counter++;
                       } else {
                           if ($counter == 0) {
                               $data['msg'] = 'File Moved SuccessFully';
                           }
                       }
                       $file_error = "File Correctly Uploaded";
                       $data['error'] = $file_error;
                   }

                   else{
                       $file_error = "You are not allowed to upload these types of files. Kindly upload an image.";
                       $data['error'] = $file_error;
                   }
               }

           }
        }
        $im->save([
            'FileName'=>implode(',',(array)$_FILES['file_upload']['name']),
            'ID' => $id,

        ]);
        echo view('Success.php',$data);
    }





    public function read(){
        $fm = new FileModel();
        $im = new ImageModel();

        $result = $fm->select('*')->join('file','ciusers.ID=file.ID')->get();
        $result = $result->getResultArray();
        //$data['users'] = $fm->findAll();
        $data['users'] = $result;
     
        return view("reader.php",$data);
    }

   
}