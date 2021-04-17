<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<title>Transient</title>
<style>
input {
  width: 15%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
input[type="file"] {
  visibility: hidden;
  outline: none;
        position: absolute;
        width: 80%;
        z-index: -1;
        top: -5px;
        left: 40px;
        font-size: 17px;
        color: #b8b8b8;
      }
      .button-wrap {
        position: relative;
        width: 100%
      }
.p1 {
  font-family: "Times New Roman", Times, serif;
  color: #111111;
}

.p2 {
  font-family: Arial, Helvetica, sans-serif;
    color: #e9eaea;
	font-family: "Roboto",sans-serif;
	font-size: .9285714285714285rem;

}

.p3 {
font-family: 'Rubik', sans-serif;
    color:white;
}
.button {
  background-color: #4C50AF;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  transition-duration: 0.2s;
}
.button:hover {
  background-color: #00bb88;
  color: white;
}
.button2 {
  background-color: #AF504C;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  transition-duration: 0.2s;
}
.button2:hover {
    background: #333333;
}
.hidden {
    display:none;
}

.container {
        display: flex;
        align-items: flex-start;
        justify-content: flex-start;
        width: 100%;
      }

    .topBanner {
        background-color: #EBEBEB;
    }
</style>

</head>
<body style="background-color:#222222;">
<p class = "p3">Upload Demo</p>
<p class = "p2">Size limit: 4000MB</p>
<div class="p2">

  <form method="POST" action="upload.php" enctype="multipart/form-data">
    <div>
      <!-- <span>Upload a File:</span> -->
      <!-- <input type="file" name="uploadedFile" /> -->
    </div>
    <!-- <input type="file" class="hidden" id="uploadFile"/> -->

     <div class="container">
      <div class="button-wrap">
        <label class="button2" for="upload">Choose File</label>
  <label style = "color:#aaaaaa; font-size: 17px;" id="fileLabel">No File Chosen</label>
        <input  id="upload" type="file" name="uploadedFile" value = "chosen" onchange="pressed()">
        <span id="demo"></span>
        <?php
    // if (isset($_SESSION['fileMessage']) && $_SESSION['fileMessage'])
    // {
    //   printf('<b>%s</b>', $_SESSION['fileMessage']);
    // }
  ?>
      </div>
    </div>
    <input class = "button" type="submit" name="uploadBtn" value= "Upload"/>
  </form>
  <br><br>
  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
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
window.pressed = function(){
    var a = document.getElementById('upload');
    if(a.value == "")
    {
        fileLabel.innerHTML = "Choose file";
    }
    else
    {
        var theSplit = a.value.split('\\');
        fileLabel.innerHTML = theSplit[theSplit.length-1];
    }
};
</script>

</body>
</html>