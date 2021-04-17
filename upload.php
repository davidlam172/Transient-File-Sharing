<?php
session_start();
$upCheck = false;
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') {
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    // $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < 15; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }
    $newFileName = $randomString . md5(time() . $fileName) . '.' . $fileExtension;

    // check if file has one of the following extensions
    // $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc', 'mp3', 'wav');

    // if (in_array($fileExtension, $allowedfileExtensions))
    // {
    // directory in which the uploaded file will be moved
    $uploadFileDir = './uploaded_files/';
    $dest_path = $uploadFileDir . $newFileName;

    if (move_uploaded_file($fileTmpPath, $dest_path)) {
      $message = 'Your file <span style = "color:#aaaaff;">' . $fileName . '</span>  has been uploaded!';
      $upCheck = true;
    } else {
      $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
    }
    // }
    // else
    // {
    //   $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    // }
  } else {
    $message = 'There was an error in the file upload...';
    // $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['upCheck'] = $upCheck;
$_SESSION['message'] = $message;
$_SESSION['fileName'] = $fileName;
$_SESSION['fileCode'] = $newFileName;
header("Location: index.php");
