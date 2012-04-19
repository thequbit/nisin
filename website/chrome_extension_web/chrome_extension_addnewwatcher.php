<? 
	//Make sure we are logined in, and we are admin.
	session_start();
	if( !isset($_SESSION['username']) )
	{
		header("location:plugin_login.html");
	}
?>

<html>
<head>
<title>WebWatcher - Add a URL to Watch</title>
</head>
<body>

	<div>

	<form name="loginform" method="post" action="plugin_newurl.php">
	
		Display Name:</br>
		<input name="displaynametext" type="text" id="displayname" size="40" value="<? echo $_POST['url']; ?>"></br>
		
		URL to Watch:</br>
		<input name="urltext" type="text" id="url" size="60" value=""></br>
		
		Keyword to check for:</br>
		<input name="keywordtext" type="text" id="keyword" size="40" value=""></br>
		
		Contact to use:</br>
		<input name="contacttext" type="text" id="contact" size="40" value=""></br>
		
		Check this page every 
		<Select>
			<Option Value='0'>Hour</Option>
			<Option Value='1'>6 Hours</Option>
			<Option Value='2'>12 Hours</Option>
			<Option Value='3'>24 Hours</Option>
			<Option Value='4'>Week</Option>
			<Option Value='5'>Two Weeks</Option>
			<Option Value='6'>Month</Option>
		</Select>
		
		</br> </br>
		
		<input type="submit" name="updatebutton" value="Add URL"></br>

	</form>
	
	</div>

</body>
</html>