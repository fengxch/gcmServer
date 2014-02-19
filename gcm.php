<html>
<head>
<title>AndroidBegin - Android GCM Tutorial</title>
<link rel="icon" type="image/png" href="http://www.androidbegin.com/wp-content/uploads/2013/04/favicon1.png"/>
</head>
<body>

<a href="http://www.AndroidBegin.com" target="_blank">
<img src="http://www.androidbegin.com/wp-content/uploads/2013/04/Web-Logo.png" alt="AndroidBegin.com"></br></a></br>
<form action="gcm_engine.php" method="post">
<INPUT size=70% TYPE="hidden" VALUE="AIzaSyA6-o89WI-spluhoANDfoC3fD7iZwzDRWc" NAME="apiKey"/></br>
<INPUT size=70% TYPE = "hidden" VALUE="<?php $string = file_get_contents("deviceid.json"); $json_a = json_decode($string, true); echo $json_a["deviceid"]?>" NAME = "registrationIDs"/></br></br>
Notification Message : <INPUT size=70% TYPE = "Text" VALUE="0" NAME = "message"></br></br>
<input type="submit" value="Send Notification"/>
</form>

</body>
</html>