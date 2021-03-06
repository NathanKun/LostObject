<?php
	require "./includes/connect_database.inc.php";
    global $conn;

    echo "<h3>La liste des objets déclarés</h3>";

    $sql = "SELECT * FROM objectDeclared_ojd INNER JOIN object_obj ON objectDeclared_ojd.ojd_obj_id = object_obj.obj_id";
    $result = $conn->query($sql);
	$conn->close();
    
    if ($result->num_rows > 0) {
        echo"<table id=\"table_declared\">
        <tr>
        <th>Nom</th>
        <th>Photo</th>
        <th>Description</th>
        <th>Déclareur(e)</th>
        <th class=\"date\">Date de la déclaration</th>
        <th class=\"found\">Trouvé</th>
        <th class=\"id\">id</th></tr>";

        // output data of each object wasn't marked as abandonned, found or returned.
        while($row = $result->fetch_assoc()) {
			if ($row['obj_stat'] == 1){
				echo "<tr>
                <td>" . htmlentities($row["obj_name"]). "</td>";
                // show photo if exist
                if(!is_null($row["obj_photofilename"])){
                    echo "<td>
                    <a href=\"./src/photo/" . $row["obj_photofilename"] . "\">
                    <img class=\"photo\" src=\"./src/photo/" . $row["obj_photofilename"] . "\" alt=\"" . $row["obj_photofilename"] . "\" >" .
                    "</a></td>";
                } else {
                    echo "<td><img class=\"photo\" src=\"./src/photo/nophoto.png\" alt=\"nophoto.png\" ></td>";
                }
                echo "<td>" . htmlentities($row["obj_description"]). "</td>
                <td>" . htmlentities($row["ojd_declarer"]) . "</td>
                <td class=\"date\">" . $row["obj_adddate"] . "</td>
                <td class=\"found\">
                <img class=\"foundImg\" onclick=\"foundObject(this);\" src=\"./src/found.png\" alt=\"found\"></td>
                <td class=\"id\">" . $row["obj_id"] . "</td></tr>";
			}
        }
        echo "</table>";
    } else {
        echo "0 results<br>";
    }
?>
