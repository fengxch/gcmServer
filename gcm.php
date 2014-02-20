<html>
<head>
<title>AndroidBegin - Android GCM Tutorial</title>
<link rel="icon" type="image/png" href="http://www.androidbegin.com/wp-content/uploads/2013/04/favicon1.png"/>
</head>
<body>
<?php include('util.php')?>
<a href="http://www.AndroidBegin.com" target="_blank">
<img src="http://www.androidbegin.com/wp-content/uploads/2013/04/Web-Logo.png" alt="AndroidBegin.com"></br></a></br>
<form action="gcm_engine.php" method="post">
<INPUT size=70% TYPE="hidden" VALUE="AIzaSyA6-o89WI-spluhoANDfoC3fD7iZwzDRWc" NAME="apiKey"/></br>
<INPUT size=300% TYPE = "hidden" VALUE="<?php echo getDeviceids()?>" NAME = "registrationIDs"/></br></br>
Notification Message : <INPUT size=70% TYPE = "Text" VALUE="0,1" NAME = "message"></br></br>
<input type="submit" value="Send Notification"/>
</form>

</body>
</html>