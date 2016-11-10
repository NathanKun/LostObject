<?php
	include('/includes/check_input.php');
    $id=$pw=$pw2=$name=$hint="";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $pw = $_POST['pw'];
        $name = $_POST['name'];
        $pw2 = $_POST['pw2'];
        $id = check_input($id);
        $pw = check_input($pw);
        $name = check_input($name);
        $pw2 = check_input($pw2);
		
		// check special charaters
		if($id != $_POST['id'] || $pw != $_POST['pw'] || $pw2 != $_POST['pw2'] || $name != $_POST['name']){
			// check special characters
			$message = "Les caracteres speciales sont interdits";
			//header("refresh:0;url=index.php");
			echo "<script type='text/javascript'>alert('$message');</script>";
			$hint=$message;
		} else{
            if(strlen($pw) >= 6){
            // check are pw & pw2 the same
			if($pw2 == $pw){
				// check if id is already existed
				require_once("param.inc.php");
				global $host;
				global $user;
				global $dbpw;
				global $db;
				$conn = new mysqli($host, $user, $dbpw, $db);
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
					echo "Connection failed: $conn";
				} else{
					$sql = "SELECT * FROM user_usr WHERE usr_id = '$id'";
					$result = $conn->query($sql);
					if($result->num_rows == 0)
					{
						// id doesn't exist yet, so create it!
						
						$id = $conn->real_escape_string($id);
						$pwHash = password_hash($conn->real_escape_string($pw), PASSWORD_DEFAULT);
						$name = $conn->real_escape_string($name);
						
						$sql = "INSERT INTO user_usr (usr_id, usr_name, usr_pw, usr_level) VALUES ('$id', '$name', '$pwHash', 1)";
						if ($conn->query($sql) === TRUE) {
						    $hint = "Compte créé! En cours de rediriger vers la page d'acceuil";
                            header("refresh:3;url=index.php");
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
					} else{
						// id already existed
						$hint="L'identifiant est déja pris.";
					}
					
					$conn->close();
				}
			} else {
				//pw != pw2
				$hint="Les deux mots de passes sont différent.";
			}
        } else {
                // strlen of pw <6
                $hint="Le longeur de mots de passe doit être supérieur à 6 caractères.";
            }
			
		}
	}
?>
