<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Transient</title>
  <style>
    <?php include 'main.css'; ?>
  </style>

</head>

<body style="background-color:#222222;">
  <p class="p3">Upload Demo</p>
  <p class="p2">Size limit: 4000MB</p>
  <div class="p2">
    <form method="POST" action="upload.php" id="myForm" enctype="multipart/form-data">
      <div class="container">
        <div class="button-wrap">
          <label class="button2" for="upload">Choose File</label>
          <label for="upload" class="gLabel" id="fileLabel">No File Chosen</label> <!-- Choose file Button -->
          <input type="hidden" value="myForm" name="<?php echo ini_get("session.upload_progress.name"); ?>">
          <input id="upload" type="file" name="uploadedFile" value="chosen" onchange="pressed()"> <!-- Choose file Form -->
          <span id="demo"></span>
        </div>
      </div>
      <input class="button" type="submit" name="uploadBtn" value="Upload" /> <!-- Submit Button -->
    </form>
    <div id="bar_blank">
      <!-- Loading Bar -->
      <div id="bar_color"></div>
    </div>
    <div id="status"></div>
    <script type="text/javascript" src="progBar.js"></script>
    <br><br>
    <?php
    if (isset($_SESSION['message']) && $_SESSION['message']) {
      printf('<b>%s</b>', $_SESSION['message']);
      // printf(' ');
      // printf('<b>%s</b>', $_SESSION['fileName']);
      // printf(' ');
      // printf('<b>%s</b>', $_SESSION['fileCode']);
      if ($_SESSION['upCheck']) {
        $fileCode = $_SESSION['fileCode'];
        $fileName = $_SESSION['fileName'];
        $url = 'https:\\localhost\\download.php?file=' . $fileName . '&id=' . $fileCode;
        $link = '<br><br><div class="button3"><a href= "download.php?file=' . $fileName . '&id=' . $fileCode . '" target="_blank" 
        rel="noopener noreferrer">Download your file here</a></div>';
        echo $link; #Download Button
        // echo '<button class="button3" onclick="myFunction()">Copy text</button>';

        // $fileCode = $_SESSION['fileCode'];
        // $fileName = $_SESSION['fileName'];
        // $firstPart = '<br><br><div class="button3"><a href= "uploaded_files\\';
        // $lastPart = '" download = "' . $fileName . '">Download your file here</a>';
        // $firstPart .= $fileCode . $lastPart;
        // echo $firstPart; #Download Button
      }
      unset($_SESSION['message']);
      unset($_SESSION['fileName']);
      unset($_SESSION['fileCode']);
    }
    ?>
  </div>

  <!-- <script>
    // Copy to cb script
    function myFunction() {
      var copyText = document.getElementById("myInput");
      copyText.select();
      copyText.setSelectionRange(0, 99999)
      document.execCommand("copy");
      alert("Copied the text: " + copyText.value);
    }
  </script> -->

  <script>
    // Choose file script
    window.pressed = function() {
      var a = document.getElementById('upload');
      if (a.value == "") {
        fileLabel.innerHTML = "Choose file";
      } else {
        var theSplit = a.value.split('\\');
        fileLabel.innerHTML = theSplit[theSplit.length - 1];
      }
    };
  </script>

</body>

</html>