<?php

class ContactController extends Controller {

    public $layout = "template_backend";

    public function actionIndex() {
        $contact = new Contact();
        $data['contact'] = $contact->gat_contact();
        $data['social'] = $contact->get_social_media();

        $this->render("//backend/contact/view", $data);
    }

    public function actionCreate() {
        $contact = new Contact();
        $data['contact'] = $contact->gat_contact();
        $data['massocial'] = $contact->mas_social();
        $this->render("//backend/contact/create", $data);
    }

    public function actionSave() {
        $contact = new Contact();
        $check = $contact->gat_contact();
        $columns = array(
            "email" => $_POST['email'],
            "tel" => $_POST['tel'],
            "address" => $_POST['address']
        );
        if (!empty($check)) {
            Yii::app()->db->createCommand()
                    ->update("contact", $columns, '1=1');
        } else {
            Yii::app()->db->createCommand()
                    ->insert("contact", $columns);
        }
    }

    public function actionSave_social() {
        $columns = array(
            "social_id" => $_POST['social_id'],
            "account" => $_POST['account']
        );
        Yii::app()->db->createCommand()
                ->insert("contact_social", $columns);
    }

    public function actionGet_data_social() {
        $contact = new Contact();
        $data['social'] = $contact->get_social_media();

        $this->renderPartial("//backend/contact/datasocial", $data);
    }

    public function actionDelete_social() {
        $id = $_POST['id'];
        Yii::app()->db->createCommand()
                ->delete("contact_social", "id = '$id' ");
    }

    public function actionSaveupload() {
        // Define a destination
        $targetFolder = Yii::app()->baseUrl . '/uploads/contact'; // Relative to the root
       
        if (!empty($_FILES)) {

            $files = glob('uploads/contact/*');  
           
            foreach($files as $file) { 
                if(is_file($file))  
                    unlink($file);  
            } 
            

            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $FileName = time() . $_FILES['Filedata']['name'];
            $targetFile = rtrim($targetPath, '/') . '/' . $FileName;

            // Validate the file type
            $fileTypes = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            $image_info = getimagesize($_FILES["Filedata"]["tmp_name"]);
            $image_width = $image_info[0];
            $image_height = $image_info[1];
            //if ($image_width != "258" && $image_height != "59") {
            //    echo 2;
            //    exit();
            //}
            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

                //insert
                $columns = array(
                    "picture" => $FileName,
                    "d_update" => date('Y-m-d H:i:s')
                );

                Yii::app()->db->createCommand()
                        ->update("contact", $columns);
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

}
