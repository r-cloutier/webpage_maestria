<br><br>
<p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>Option 3: upload input file</b></p>&nbsp;&nbsp;&nbsp;

<?php
$target_dir = "/data/cpapir/www/rvfc/UploadedFiles/";
$target_file = $target_dir.basename($_FILES["userfile"]["name"]);
$uploadOk = 1;

$inipath = php_ini_loaded_file();
$var = phpinfo();
echo $var;

// Check if image file is a actual image or fake image
if (isset($_GET["submit_file"])) {
    $check = (isset($_FILES["userfile"]["tmp_name"]));
    if($check !== false) {
	echo "File is good";
	$uploadOk = 1;
    } else {
	echo "File is not okay";
	$uploadOk = 0;
    }
}
	//echo $_FILES["userfile"]["tmp_name"];
?>
