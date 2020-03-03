<html>
<head>
	<title>Форма зворотнього зв'язку</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
	 <div id="contact-wrapper">
		<h2 align ="center">FORM</h2>		
		<form action="index.php" enctype="multipart/form-data"  method="POST">
			<input type="text" class="input" placeholder="Введіть ім'я:" maxlength="30" name="name" required>
			<input type="text" class="input" placeholder="Введіть прізвище:" maxlength="30" name="lastname">
			<input type="email" class="input" placeholder="Введіть e-mail:" name="mail" required>
			<input type="tel" class="input" placeholder="Введіть номер телефону:" name="phone"required>  <input type="hidden" name="MAX_FILE_SIZE" value="30000">
			<input type="file" accept="image/*" name="file" >			
			<input type="submit" value="Надіслати" class="button_ok">
		</form>
	</div>	

<?php	

		$xml = simplexml_load_file('file.xml');
		echo"<table border='1px' width='50%' id='table' class='sort'> ";	
		echo "<thead>
		<tr><td>Ім'я</td><td>Прізвище</td> <td>Email</td><td>Номер телефону</td> <td>Фото</td> <td>Del</td></tr>
		</thead><tbody>";
			foreach ($xml as $x) {		
			echo "<tr>";
			echo "<td>{$x->name}</td>";
			echo "<td>{$x->lastname}</td>";
			echo "<td>{$x->mail}</td>";
			echo "<td>{$x->phone}</td>";    
			echo "<td><img width='150px' height='150px' src={$x->file}></td>";
			echo "</tr>";    
			}
		echo "</tbody></table>";		
		
if (isset($_POST['mail']) ) {
		/*   завантаження, зміна розміру і пропорцій, збереження. 
		include('classSimpleImage.php');
		$image = new SimpleImage();
		$image->load($_FILES['uploaded_image']['tmp_name']);
		$image->resize(300, 300);
		$image->save('image.jpg');
						*/
	$xml = simplexml_load_file('file.xml');
	$newGuy = $xml->addChild("guy");					
	$newGuy->addChild("name", $_POST['name']);
	$newGuy->addChild("lastname", $_POST['lastname']);
	$newGuy->addChild("mail", $_POST['mail']);
	$newGuy->addChild("phone", $_POST['phone']);
	$newGuy->addChild("file", $_POST['file']);
	$xml->asXML('file.xml');
	echo "Додано до XML-файлу! Оновіть сторінку"; 	
	header("Location: index.php");
	exit;		
}
?>	

	<script src="script.js"></script>
</body>
<html>