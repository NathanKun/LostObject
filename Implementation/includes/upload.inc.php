<?php
    include "./path.php";
    $obj_name = "";
    $obj_description = "";
    $hint = "";
    // phpinfo();
    // if click on submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $isFileCorrect = false;
        $isFileSet = false;
        require_once "/includes/verifySession.inc.php";
        // check if file is set
        if(!empty($_FILES["file"]["name"])){
            $isFileSet = true;
            // check file size and type
            if ((($_FILES["file"]["type"] == "image/png") ||   
                ($_FILES["file"]["type"] == "image/jpeg") || 
                ($_FILES["file"]["type"] == "image/jpg")) && 
                ($_FILES["file"]["size"] < 20 * 1000 * 1000)){
                // if file no error
                if($_FILES["file"]["error"] > 0) {
                    echo "Erreur : ". $_FILES["file"]["error"];
                } else {
                    // show file detail
                    /*echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                    echo "Type: " . $_FILES["file"]["type"] . "<br />";
                    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                    echo "Stored in: " . $_FILES["file"]["tmp_name"];*/
                
                    // rename file and save it
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    move_uploaded_file($_FILES["file"]["tmp_name"], ROOTPATH."/src/photo/" . $newfilename);
                    //$hint =  "Les données de l'objet et le ficher '$newfilename' est enregistrer";
                    
                    $isFileCorrect = true;
                }
            } else {
                echo "Le taille du fichier est trop grand ou le format  n'est pas correct";
            }
        }
        
        //sql part
        if(!$isFileSet || ($isFileSet && $isFileCorrect)){
            include "./includes/connect_database.inc.php";
            global $conn;
            
            // build object_obj request depending on having photo or not, common part for two different upload
			
            $sql="INSERT INTO object_obj (obj_name, obj_description, obj_adddate";
			
            $obj_name = $conn->real_escape_string($_POST['obj_name']);
            $obj_description = $conn->real_escape_string($_POST['obj_description']);
			
            if($isFileSet){
                $sql .= ", obj_photofilename) VALUES ('".$obj_name."', '".$obj_description."', now(), '$newfilename');";
                // echo $sql . "<br>";
            } else {
                $sql .= ") VALUES ('".$obj_name."', '".$obj_description."', now());";
                // echo $sql . "<br>";
            }
    
            if ($conn->query($sql) === TRUE) {
                // What a wonderful feature??!
                $last_id = $conn->insert_id;
				
                if($_SESSION["uploadList"] == "ojf"){
                    
                    // objectfound_ojf
                    $sql = "INSERT INTO objectfound_ojf (ojf_obj_id, ojf_adder) VALUES ($last_id, '". $_SESSION["usr_id"] ."');";
                } else if($_SESSION["uploadList"] == "ojd"){
                    
                    // objectdeclared_ojd
                    $sql = "INSERT INTO objectdeclared_ojd (ojd_obj_id, ojd_declarer) VALUES ($last_id, '". $_SESSION["usr_id"] ."');";
                } else {
                    
                    // $_SESSION["uploadList"] error
                }
                
                if ($conn->query($sql) === TRUE) {
                    $hint =  "Les données de l'objet sont enregistrés.";
                    switch($_SESSION["uploadList"]){
                        case "ojf":
                            header("refresh:2;url=index_admin.php");
                            break;
                        case "ojd":
                            header("refresh:2;url=index_student.php");
                            break;
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
 ?>