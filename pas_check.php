<!DOCTYPE html>
<html lang="ca">
<head>
  <title>Inscripcions Hivernal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

		
   <?php
   	echo "<h2>Verificació de dades</h2>";
      include 'config.php';
      
      // !!!!!!!!!!   	
      	print_r(array_values($_POST));
   // !!!!!!!!!!!!!!
      
          
	
      	
      	
      	
      	
      	/* torna a entrar el formulari en format de taula */
 /*    	echo "<form action='pas_check.php' method='POST'><table>";
							
      	foreach($labels as $field => $label)
      	{
      		$good_data[$field]=strip_tags(trim($_POST[$field]));
      		$field = 'nom';
      		echo "<tr>
      				<td style='text-align: right; font-weight: bold'>$label</td>
      				<td><input type='text' name='$field' size='65'
      					maxlength='65' value='$good_data[$field]'></td>
      				</tr>";
      	}
      	
     	
      	echo "<tr>
      			<td colspan='2' style='text-align: center'>
      				<input type='submit' value='Guarda dades'>";
      	
      	
      	
      	echo "</td></tr></table></form>";
       	
 */
   ?>
      
   </body>
</html>
