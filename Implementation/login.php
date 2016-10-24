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
        $conn = new mysqli('localhost', 'root', '', 'ObjetsPerdus');
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
                while($row = $result->fetch_assoc()){
                    if($row["usr_id"] == $id){
                        $is_id_exist=true;
                        if($row["usr_pw"] == $pw){
                            // login successful
                            $hint="Bienvenu " . $row["usr_name"] . ".";
                            switch($row["usr_level"]){
                                case 1:
                                    break;
                                case 2:
                                    
                                    break;
                                case 3:
                                    
                                    break;
                                case 99:
                                    header("refresh:0;url=print_database.php");
                                    break;
                                    
                                default:
                                    $hint="User level incorrect, it can not be " . $row["usr_level"] . " .";
                            }
                            break;
                        } else{
                            // password wrong
                            $hint="Le mots de passe est incorrect!";
                        }
                    }
                }
            }
        
        }
        
    }
}
?>
