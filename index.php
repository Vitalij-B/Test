<html>
<head>
	<title>Форма зворотнього зв'язку</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

 


	 <div id="contact-wrapper">
		<h2>Форма зворотнього зв'язку</h2>
		
		<form action="addtoxml.php" enctype="multipart/form-data"  method="POST">
			<p>Введіть ім'я: <input type="text" maxlength="30" name="name" required></p>
			<p>Введіть прізвище: <input type="text" maxlength="30" name="lastname"></p>
			<p>Введіть e-mail: <input type="email" name="mail" required></p>
			<p>Введіть номер телефону: <input type="tel" placeholder="+380-xx-xxx-xxxx" name="phone"required></p>
			    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<p>Прикріпіть фото <input type="file" accept="image/*" name="file"></p>
			
			<input type="submit" value="Надіслати">
		</form>
	</div>	
		
<?php	
	
	
	$xml = simplexml_load_file('file.xml');
	echo("<p> Табл.</p>");  	
    echo"<table border='1px' width='50%' id='table' class='sort'> ";
	
	echo "<thead>
	<tr><td>Ім'я</td><td>Прізвище</td> <td>e-mail</td><td>Телефон</td> <td>Фото</td> <td>Del</td></tr>
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

?>	

	<script src="script.js"></script>
</body>
<html>