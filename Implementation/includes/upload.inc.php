<?php
include "/path.php";
$obj_name = "";
$obj_description = "";
$hint = "";
// phpinfo();
    // if click on submit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $isFileCorrect = false;
        $isFileSet = false;
        include "verifySession.inc.php";
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
        if(!$isFileSet || ($isFileSet && $isFileCorrect)){
            // sql part
            // object_obj part
            include "/includes/connect_database.inc.php";
            global $conn;
            $sql="INSERT INTO object_obj (obj_name, obj_description, obj_adddate";
            if($isFileSet){
                $sql .= ", obj_photofilename) VALUES ('".$_POST['obj_name']."', '".$_POST['obj_description']."', now(), '$newfilename');";
                // echo $sql . "<br>";
            } else {
                $sql .= ") VALUES ('".$_POST['obj_name']."', '".$_POST['obj_description']."', now());";
                // echo $sql . "<br>";
            }
            if ($conn->query($sql) === TRUE) {
                // What a wonderful feature??!
                $last_id = $conn->insert_id;
                
                // objectfound_ojf part
                $sql = "INSERT INTO objectfound_ojf (ojf_obj_id, ojf_adder) VALUES ($last_id, '". $_SESSION["usr_id"] ."');";
                if ($conn->query($sql) === TRUE) {
                    $hint =  "Les données de l'objet est enregistrer.";
                    header("refresh:2;url=index_admin.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
 ?>
