<br><br>
<p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>Option 3: upload input file</b></p>&nbsp;&nbsp;&nbsp;

<?php
$target_dir = "UploadedFiles/";
$target_file = $target_dir . basename($_FILES["userfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit_file"])) {
    $check = (isset($_FILES["userfile"]["tmp_name"]));
    if($check !== false) {
	echo "File is good";
	$uploadOk = 1;
    } else {
	echo "File is not okay";
	$uploadOk = 0;
    }
}
?>
