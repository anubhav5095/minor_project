<?php
session_start();
$user=$_SESSION['mailrenter'];
include '..\db.php';
$pDatabase= Database::getInstance();

// Check if image file is a actual image or fake image


if(isset($_POST["submit"])) 
{
	$target_dir = "images/";
	echo $tmp=$_FILES["fileToUpload"]["tmp_name"];
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$check = getimagesize($tmp);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 
else 
{
	if (move_uploaded_file($tmp, $target_file)) 
	{
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    
		$check=$pDatabase->query("SELECT user from image_uploads where user='$user'");
		$res=mysqli_num_rows($check);
		if($res==0)
		{
		    	$quer=$pDatabase->query("INSERT INTO `image_uploads`(`id`, `url`, `user`) VALUES ('','$target_file','$user')");
		    	if($quer)
		    	{?>
		    		<script>
						if(confirm("Pic uploaded !!"))
						{
						window.location="profile_renter.php";
						}
						else
						{
						window.location="profile_renter.php";
						}
						</script><?php
		        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    	}
		    	else 
		    	{
		        echo "Sorry, there was an error uploading your file.";
		    	}
    	}
    	else
    	{
    		$quer1=$pDatabase->query("UPDATE `image_uploads` SET `url`='$target_file' WHERE user='$user'");
    		if($quer1)
    		{?>
		    		<script>
						if(confirm("Pic uploaded !!"))
						{
						window.location="profile_renter.php";
						}
						else
						{
						window.location="profile_renter.php";
						}
					</script>
			<?php
    		}
    	}
    }
    else echo "NOt uploaded";
 } 
}
// Check if file already exists

    
?>