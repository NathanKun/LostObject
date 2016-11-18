<?php
if (isset($_POST['obj_id'])) {
	require "./path.php";
	require INCLUDESPATH . "/connect_database.inc.php";

    //$sql = "DELETE FROM object_obj WHERE obj_id=".$_POST['obj_id'];
    $sql = "UPDATE object_obj SET obj_stat=" . $_POST['action'] . " WHERE obj_id=" . $_POST['obj_id'];
	
    if ($conn->query($sql) === TRUE) {
    // echo "Objet supprimé. obj_id=" . $_POST['obj_id'];
		$conn->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
