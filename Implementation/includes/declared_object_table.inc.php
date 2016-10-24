<?php
    $conn = new mysqli('localhost', 'root', '', 'ObjetsPerdus');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Connection failed: $conn";
    } 

    echo "<h3>La liste des objets déclarés</h3>";

    $sql = "SELECT * FROM objectDeclared_ojd INNER JOIN object_obj ON objectDeclared_ojd.ojd_obj_id = object_obj.obj_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo"<table id=\"table\">
        <tr>
        <th>Nom</th>
        <th>Photo</th>
        <th>Description</th>
            <th>Date de l'a déclaration</th>
        <th class=\"found\">Trouvé</th>
        <th class=\"id\">id</th>";

        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["obj_name"]. 
                "</td><td>" . $row["obj_description"].  
                "</td><td>" . $row["ojd_declarer"]. 
                "</td><td>" . $row["ojd_declarationdate"]. 
                "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results<br>";
    }
?>
