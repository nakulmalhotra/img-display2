<?php
session_start();
if(isset($_SESSION['logged_in']))
{
		  $b=$_SESSION['logged_in'];
}
else
{
header("Location:login.html");
}
?>




<html>
<body background="imgbg.jpg" width=100% >

<form action="imgupload.php" enctype="multipart/form-data" method="post">
 <center>
<table style="border-collapse: collapse; font: 12px Tahoma;margin-top:80px;" border="2" cellspacing="5" cellpadding="40">

<tbody><tr>

<td>

<input name="uploadedimage" type="file">

</td>
</tr>
<tr>
<td>

<input name="Upload Now" type="submit" value="Upload Image">

</td>
</tr>
</center>
 </tbody></table>
</form>


 <button class="button button-block" ><a href="http://localhost/MobiNew/imgdisplay.php">Display</a></button>

</html>

		<?php
					$dblink=mysql_connect("localhost","root","");
					if(!$dblink) die("could not connect to mysql");
					$myDB="mobi";
					mysql_select_db($myDB);
									
				function GetImageExtension($imagetype)
					 {
					   if(empty($imagetype)) return false;
					   switch($imagetype)
					   {
						   case 'image/bmp': return '.bmp';
						   case 'image/gif': return '.gif';
						   case 'image/jpeg': return '.jpg';
						   case 'image/png': return '.png';
						   default: return false;
					   }

					 }
				if(isset($_FILES["uploadedimage"]["name"]))
				{
				if (!empty($_FILES["uploadedimage"]["name"])) 
				{
					$uploads_dir = 'images/';
					
					$file_name=$_FILES["uploadedimage"]["name"];
					$tmp_name=$_FILES["uploadedimage"]["tmp_name"];
					$imgtype=$_FILES["uploadedimage"]["type"];
					$ext= GetImageExtension($imgtype);
					$imagename=date("d-m-Y")."-".time().$ext;
					
					$name = "MobiNew/images/".basename($_FILES["uploadedimage"]["name"]);
					
					//$target_path = "images/".$imagename;
					
				if(move_uploaded_file($_FILES["uploadedimage"]["tmp_name"],"$uploads_dir".$_FILES["uploadedimage"]["name"])) 
				{
				echo " $uploads_dir ";
					 $query_upload="INSERT into `img` (`images_path`,`submission_date`) VALUES ('".$name."','".date("Y-m-d")."')";
					 $_SESSION['ImgName']= "".basename($_FILES["uploadedimage"]["name"]);
					mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error()); 
				}
				else{
				   exit("Error While uploading image on the server");
				}

				
			}	
					mysql_close($myDB);
			
				}	
			?>
			

			
			
			
					
					