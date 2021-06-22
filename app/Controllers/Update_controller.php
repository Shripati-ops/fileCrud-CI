<?php 

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\FileModel;
use App\Models\ImageModel;


class Update_controller extends BaseController{

public function index(){
    $fm = new FileModel();
    $im = new ImageModel();
    $id = $this->request->getVar('id'); 
    $fileID = $this->request->getVar('fileID');
    $data['fileId'] = $fileID;
    $output = $fm->select('*')->where('id',$id)->get();
    $foutput = $im->select('*')->where('fileid',$fileID)->get();
    $data['files'] = $foutput->getResultArray();
    $data['pre_load'] = $output->getResultArray();
    $data['id'] = $id;
    return view('Update.php',$data);
}

public function update()
{
    $fm = new FileModel();
    $im = new ImageModel();
    $checked_data = implode(",", $this->request->getPost('hobbies'));

    $fm->save([
        'id' => $this->request->getPost('id'),
        'Name' => $this->request->getPost('Username'),
        'Location' => $this->request->getPost('Location'),
        'Email' => $this->request->getPost('Email'),
        'Gender' => $this->request->getPost('Gender'),
        'Hobbies' => $checked_data,

    ]);

    $id = $this->request->getPost('id');
    $fileID = $this->request->getPost('fileID');
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
        'fileid' => $this->request->getPost('fid'),
        'FileName' => implode(',', (array)$_FILES['file_upload']['name']),
        'ID' => $id,
    ]);

    $data['title'] = "Records updated SuccessFully";
    $data['error_msg'] = '';
    $data['msg'] = '';
    $data['fileID'] = $fileID;
    return view('Success.php',$data);
}

public function delete(){
    $id = $this->request->getVar('id'); 
    $fm = new FileModel();
    $im = new ImageModel();
    $fm->where('id',$id);
    $im->where('ID',$id);
    $im->delete();
    $fm->delete();
    $data['title'] = "Deleted Record Successfully";
    $data['error'] = '';
    $data['error_msg'] = '';
    $data['msg'] = '';
    return view("Success.php",$data);
}

}