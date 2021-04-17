<!DOCTYPE html>
<html>

<head>
  <title>Download</title>
  <style>
    <?php include 'main.css'; ?>
  </style>

</head>

<body style="background-color:#222222;">
  <script src="function.js"></script>
  <p class="p3">Download Demo</p>
  <?php
  $url = $_SERVER['REQUEST_URI'];
  $url_components = parse_url($url);
  parse_str($url_components['query'], $params);

  $firstPart = '<div class="button3"><a href= "uploaded_files\\';
  $fileCode = $params['id'];
  $fileName = $params['file'];
  if (file_exists('uploaded_files\\'.$fileCode)) {
    $lastPart = '" download = "' . $fileName . '">Download your file here</a></div>';
    $firstPart .= $fileCode . $lastPart;
    echo $firstPart;
    echo '<span class = "pLabel"> ' . $fileName . '</span> <span class="gLabel">' . filesize('uploaded_files\\' . $fileCode) . ' bytes</span>';
  }
  else
  {
    echo 'The file you are looking for is unavailable.';
  }
  // $fileName = basename('favicon.ico');
  // $filePath = 'files/'.$fileName;
  // if(!empty($fileName) && file_exists($filePath)){
  //     // Define headers
  //     header("Cache-Control: public");
  //     header("Content-Description: File Transfer");
  //     header("Content-Disposition: attachment; filename=$fileName");
  //     header("Content-Type: application/zip");
  //     header("Content-Transfer-Encoding: binary");

  //     // Read the file
  //     readfile($filePath);
  //     exit;
  // }else{
  //     echo 'The file does not exist.';
  // }
  ?>
</body>

</html>