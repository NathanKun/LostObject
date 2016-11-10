<?php
	require "connect_database.inc.php";
    global $conn;

    echo "<h3>La liste des objets trouvés</h3>";

    $sql = "SELECT * FROM objectFound_ojf INNER JOIN object_obj ON objectFound_ojf.ojf_obj_id = object_obj.obj_id";
    $result = $conn->query($sql);
	$conn->close();
    
    if ($result->num_rows > 0) {
        echo"<table id=\"table_found\">
        <tr>
        <th>Nom</th>
        <th>Photo</th>
        <th>Description</th>
        <th class=\"date\">Date de l'ajout</th>
        <th class=\"returned\">Retourner</th>
        <th class=\"abandon\">Abandonner</th>
        <th class=\"id\">id</th>";

        // output data of each object wasn't marked as abandonned, found or returned.
        while($row = $result->fetch_assoc()) {
			if ($row['obj_stat'] == 1){
				echo "<tr>
                <td>" . $row["obj_name"]. 
                "</td>";
                // show photo if exist
                if(!is_null($row["obj_photofilename"])){
                    echo "<td><a href=\"../src/photo/" . $row["obj_photofilename"] . "\">
                    <img class=\"photo\" src=\"../src/photo/" . $row["obj_photofilename"] . "\" alt=\"" . $row["obj_photofilename"] . "\" >" .
                    "</a></td>";
                } else {
                    echo "<td><img class=\"photo\" src=\"../src/photo/nophoto.png\" alt=\"nophoto.png\" ></td>";
                }
                echo "<td>" . $row["obj_description"].  "</td>
                <td class=\"date\">" . $row["obj_adddate"]. "</td>
                <td class=\"returned\">
                <img class=\"returnedImg\" onclick=\"returnedObject(this);\" src=\"../src/returned.png\" alt=\"returned\"></td>
                <td class=\"abandon\">
                <img class=\"returnedImg\" onclick=\"returnedObject(this);\" src=\"../src/delete.png\" alt=\"delete\"></td>
                <td class=\"id\">" . $row["obj_id"] . "</td></tr>";
			}
        }
        echo "</table>";
    } else {
        echo "0 results<br>";
    }
?>
