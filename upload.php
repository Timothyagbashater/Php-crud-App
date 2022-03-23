<?php
if(isset($_POST['submit'])){

    if($_SERVER['REQUEST_METHOD'] == 'post'){
        $file = filter_input(INPUT_POST, 'file');

        if(empty($file)){
            $file_error = 'Choose image to upload';
        }
    }
   
    $file = $_FILES['file'];
   // print_r($fileName);
    //Declaring the properties you want to receive
    $fileName = $_FILES['file']['name'];
    
   //print_r($fileName);
   
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg', 'png', 'pdf');
    //var_dump($fileActualExt);
    //Check if the image meet the file format
    if(in_array($fileActualExt,$allowed )){
        if($fileError === 0){
            //Sets the size of file to be uploaded
            if($fileSize < 1000000){
                //Ensures that a file is not repeated
                $fileNameNew = uniqid('Test_image_', true).".".$fileActualExt;
                //The directory to which you want the file to be saved.
                $fileDestination = 'uploads/'.$fileNameNew;
                // Move the file from temporary location to where you want it to be
                move_uploaded_file($fileTmpName, $fileDestination);
                //echo 'File uploaded successfully!';
            } else{
                echo 'File size too large';
            }
        }else{
            echo 'There was an error uploading the file';
        }
    }
    else {
       echo 'This file format is not accepted';
    }
    {

    }
}

?>
