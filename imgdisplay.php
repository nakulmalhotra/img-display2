
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

<?php
	$dblink=mysql_connect("localhost","root","");
	if(!$dblink) die("could not connect to mysql");
	$myDB="mobi";
	mysql_select_db($myDB);
					
						
	$select_query = "SELECT images_path FROM  img ORDER by images_id DESC";
	$sql = mysql_query($select_query) or die(mysql_error());	
	
	
      if(isset($_SESSION['ImgName'])) $nameimg=$_SESSION['ImgName'];
		$show="MobiNew/images/".$nameimg;
		//echo  $fancy[0] ;
		echo "<img src='/".$show."' />";
	
	
	
?>

<html>
<body>
<form action="http://localhost/MobiNew/choices.php" method=post >

<button type=submit class="" > Continue </button> 

</form>
</body>
</html>

