<? 
	//Make sure we are logined in
	session_start();
	if( !isset($_SESSION['username']) )
	{
		header("location:plugin_login.html");
	}
?>

<html>
<head>
<title></title>
</head>
<body>

	<?
	
		include '../mysqlcredentials.php';
		
		// Connect to server and select databse.
		$con = mysql_connect("$host", "$username", "$password") or die("cannot connect"); //TODO: something more eligant than this ...
		mysql_select_db("$db_name") or die("cannot select DB");
	
		$url = $_POST['urltext'];
		$name = $_POST['nametext'];
		$keyword = $_POST['keywordtext'];
		$contact = $_POST['contacttext'];
		$frequency = $_POST['frequencyselect'];
	
		// clean up input
		$url = stripslashes($url);
		$name = stripslashes($name);
		$keyword = stripslashes($keyword);
		$contact = stripslashes($contact);
		$frequency = stripslashes($frequency);
		
		// sanitize input
		$url = mysql_real_escape_string($url);
		$name = mysql_real_escape_string($name);
		$keyword = mysql_real_escape_string($keyword);
		$contact = mysql_real_escape_string($contact);
		$frequency = mysql_real_escape_string($frequency);
		
		// get username from session
		$myusername = $_SESSION['username'];
		
		//echo "Username: [ " . $myusername . " ]";
		
		// get userid from DB
		$sql="SELECT userid FROM users WHERE username='$myusername'";
		$result=mysql_query($sql);
		$userid=mysql_result($result,0,"userid");
	
		//echo "Username: [ " . $userid . " ]";
	
		// setup our insertion string
		$sql="INSERT INTO watcherlist (userid,name,url,keyword,contact,frequency,enabled)
			  VALUES ('$userid','$name','$url','$keyword','$contact','$frequency','1')";	
		
		// add new watcher to watcherlist table
		mysql_query($sql) or die("insert failed");
	
		/*
		echo "URL: " . $url . "</br>";
		echo "URL: " . $name . "</br>";
		echo "URL: " . $keyword . "</br>";
		echo "URL: " . $contact . "</br>";
		echo "URL: " . $frequency . "</br>";
		*/
		
	?>
	
	<font size="5">Success!</font>
	
	<script>
		window.setTimeout("window.close()", 1000);
	</script>
	
</body>
</html>