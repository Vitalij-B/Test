<title>Форму заповнено</title>

<?php



	$xml = simplexml_load_file('file.xml');
		$newGuy = $xml->addChild("guy");
		
		$newGuy->addChild("name", $_POST['name']);
		$newGuy->addChild("lastname", $_POST['lastname']);
		$newGuy->addChild("mail", $_POST['mail']);
		$newGuy->addChild("phone", $_POST['phone']);
		$newGuy->addChild("file", $FILES['file']['name']);
		
		$xml->asXML('file.xml');
	echo "Info add`ed to XML-file!! <a href='index.php'>Back to previous page</a>";
?>	



