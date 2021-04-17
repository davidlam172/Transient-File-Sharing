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

    <form method="POST" action="upload.php" enctype="multipart/form-data">
      <div>
      </div>

      <div class="container">
        <div class="button-wrap">
          <label class="button2" for="upload">Choose File</label>
          <label for="upload" style="color:#aaaaaa; font-size: 17px;" id="fileLabel">No File Chosen</label> <!-- Choose file Button -->
          <input id="upload" type="file" name="uploadedFile" value="chosen" onchange="pressed()"> <!-- Choose file Form -->
          <span id="demo"></span>
        </div>
      </div>
      <input class="button" type="submit" name="uploadBtn" value="Upload" /> <!-- Submit Button -->
    </form>
    <br><br>
    <?php
    if (isset($_SESSION['message']) && $_SESSION['message']) {
      printf('<b>%s</b>', $_SESSION['message']);
      printf(' ');
      printf('<b>%s</b>', $_SESSION['fileName']);
      printf(' ');
      printf('<b>%s</b>', $_SESSION['fileCode']);
      unset($_SESSION['message']);
      unset($_SESSION['fileName']);
      unset($_SESSION['fileCode']);
    }
    ?>
  </div>
  <script>
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