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

<div class="container">
  <h1>Inscripcions Hivernal del Bages 2017</h1>
  
  <br>
   <div class="row">
  		<div class="col-sm-3">
  			<div class="well well-lg">
				<p>Introducció de dades</p>
				<p><strong>Verificació de dades</strong></p>
   			<p>Compra</p>
   		</div>
   	</div>	
   	<div class="col-sm-7">
   	
  

		
	<?php
   	echo "<h2>Verificació de dades</h2>";
      include 'config.php';
      /* Configura un array amb els noms dels camps que s'utilitzen */
      $labels = array("nom" => "Nom",
      					 "cognoms" => "Cognoms",
      					 "email" => "Eamil",
      					 "telf1" => "Mòbil",
      					 "telf2" => "Telèfon emergencia",
      					 "federacio" => "Federació");
      
      // !!!!!!!!!!   	
      //	print_r(array_values($_POST));
 	  // !!!!!!!!!!!!!!
 	  	foreach($_POST as $field => $value)
      {
			/*Check each field for blank fields */
			if($value == "") 
			{
				$blank_array[] = $field;
			}      
      }
      if(@sizeof($blank_array) > 0)
      {
      	// Inici de la visualització del formulari
			echo "<h3>Formulari</h3>";
			echo "Falta informació al formulari o no té un format correcte";	
			echo "<p>Formulari per a les inscripcions de l'edició 2017 de la Hivernal del Bages<p>";
  			echo "<form action='pas_check.php' method='post'>";
  			echo "<fieldset>";
  			 	echo "<div class='form-group'>";
  			 		$good_data['nom']=strip_tags(trim($_POST['nom']));
      			$field = 'nom';
					echo "<label for='usr'>Non:</label>";
  					echo "<input type='text' class='form-control' name='nom' id='nom' maxlength='20' value='$good_data[$field]'>";
				echo "</div>";
				echo "<div class='form-group'>";
					$good_data['cognoms']=strip_tags(trim($_POST['cognoms']));
					$field = 'cognoms';
					echo "<label for='usr'>Cognoms:</label>";
					echo "<input type='text' class='form-control' name='cognoms' id='cognoms' maxlength='30' value='$good_data[$field]'>";
				echo "</div>";
				echo "<div class='form-group'>";
					$good_data['email']=strip_tags(trim($_POST['email']));
      			$field = 'email';
      			echo "<label for='usr'>Email:</label>";
      			echo "<input type='email' class='form-control' name='email' id='email' maxlength='30' value='$good_data[$field]'>";
				echo "</div>";

				echo "<div class='form-group'>";
					$good_data['telf1']=strip_tags(trim($_POST['telf1']));
      			$field = 'telf1';
  					echo "<label for='usr'>Telf. de contacte:</label>";
  					echo "<input type='text' class='form-control' name='telf1' id='telf1' maxlength='9' value='$good_data[$field]'>";
				echo "</div>";
				echo "<div class='form-group'>";
					$good_data['telf2']=strip_tags(trim($_POST['telf2']));
      			$field = 'telf2';
  					echo "<label for='usr'>Telf. cas d'emergència:</label>";
  					echo "<input type='text' class='form-control' name='telf2' id='telf2' maxlength='9' value='$good_data[$field]'>";
				echo "</div>";
      		
    	 		echo "<label>Estàs federat ?</label>";
				echo "<div class='radio'>";
					$good_data['federacio']=strip_tags(trim($_POST['federacio']));
      			$field = 'federacio';
					if($good_data['federacio']=='S') {
						echo "<label> <input type='radio' name='federacio' value='S' checked='checked'>Sí</label>";
					}else {
						echo "<label> <input type='radio' name='federacio' value='S'>Sí</label>";
					}	
				echo "</div>";
				echo "<div class='radio'>";
					if($good_data['federacio']=='N') {
						echo "<label> <input type='radio' name='federacio' value='N' checked='checked'>No</label>";
					}else{
						echo "<label> <input type='radio' name='federacio' value='N'>No</label>";
					}
				echo "</div>";  		

		
      		
  				echo "<button type='submit' class='btn btn-default'>Següent</button>";
  			echo "</fieldset>";
			echo "</form>";			
			
			
			// Acaba el procés de tornar a mostrar el formulari      
      }else {
      	echo "Dades introduïdes correctament";
			// Paràmetres per a la connexió amb la base de dades
      	$dbConnected = mysql_connect($hostname, $username, $password);
			$dbSelected = mysql_select_db($databasename, $dbConnected);
  			// Variable amb la capçalare de les dades introduïdes
			$fields_all = array_keys($labels);
			foreach($fields_all as $field)
			{
				$good_data[$field] = strip_tags(trim($_POST[$field]));							
			}
			// Verificació de la connexió a la base de dades
			if ($dbConnected) {
				echo "MySQL connection OK <br>";
				if ($dbSelected) {
					echo "DB connection OK<br>";	
					} else {
				echo "DB connection FAILED<br>";
				}	
			}
			//Carrega la informació a la base de dades
			$query = "INSERT INTO Inscrits (nom,cognoms,email,mobil,telf,federacio)
				VALUES ('$good_data[nom]','$good_data[cognoms]','$good_data[email]','$good_data[telf1]',
				'$good_data[telf2]','$good_data[federacio]')";
			$result = mysql_query($query) or die ("Could not execute");      
      	mysql_close($dbConnected);
   	}
      
          
   ?>
     </div>
   	</div> 
   </body>
</html>
