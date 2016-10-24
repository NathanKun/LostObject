<?php
if (isset($_POST['obj_id'])) {
    $conn = new mysqli('localhost', 'root', '', 'ObjetsPerdus');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Connection failed: $conn";
    } 

    $sql = "DELETE FROM object_obj WHERE obj_id=".$_POST['obj_id'];
    
    if ($conn->query($sql) === TRUE) {
    echo "Objet supprimé. obj_id=" . $_POST['obj_id'];
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    
    }
}
?>
