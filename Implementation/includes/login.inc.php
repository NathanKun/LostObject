<?php include('/includes/check_input.php');
    $id=$pw=$hint="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $pw = $_POST['pw'];
        $id = check_input($id);
        $pw = check_input($pw);
    if($id != $_POST['id'] || $pw != $_POST['pw']){
        // check special characters
        $message = "Les caracteres speciales sont interdits";
        //header("refresh:0;url=index.php");
        echo "<script type='text/javascript'>alert('$message');</script>";
        $hint=$message;
    } else{
        // check database.
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
            $sql = "SELECT * FROM user_usr WHERE usr_id = '$id';";
            $result = $conn->query($sql);
            $conn->close();
            if($result->num_rows == 0){
                // id wrong
                $hint="L'identifiant n'existe pas!";
            } else{
				$row = $result->fetch_assoc();
                if(password_verify($pw, $row["usr_pw"])){
                    // login successful
                    $hint="Bienvenu " . $row["usr_name"] . ".";
                    switch($row["usr_level"]){
                        case 1:
							header('refresh:1; url=index_student.php');
                            break;
							
                        case 2:
							header("refresh:1;url=index_admin.php");
                            break;
								
                        case 3:
							header("refresh:1;url=index_dev.php");
                            break;
							
                        case 99:
                            header("refresh:1;url=print_database.php");
                            break;
                           
                        default:
                            $hint="User level incorrect, it can not be " . $row["usr_level"] . " .";
							break;
					} 
                } else{
                     // password wrong
                     $hint="Le mots de passe est incorrect!";
                }
            }
        
        }
        
    }
}
?>
