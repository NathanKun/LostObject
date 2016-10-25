<?php
	include "connect_database.inc.php";

    echo "<h3>La liste des objets déclarés</h3>";

    $sql = "SELECT * FROM objectDeclared_ojd INNER JOIN object_obj ON objectDeclared_ojd.ojd_obj_id = object_obj.obj_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo"<table id=\"table_declared\">
        <tr>
        <th>Nom</th>
        <th>Photo</th>
        <th>Description</th>
        <th>Déclareur(s)</th>
        <th class=\"date\">Date de la déclaration</th>
        <th class=\"found\">Trouvé</th>
        <th class=\"id\">id</th>";

        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["obj_name"]. 
                "</td><td>
                <a href=\"../src/photo/" . $row["obj_photofilename"] . "\">
                <img class=\"photo\" src=\"../src/photo/" . $row["obj_photofilename"] . "\" alt=\"" . $row["obj_photofilename"] . "\" >" .
                "</a>
				</td><td>" . $row["obj_description"].  
                "</td><td>" . $row["ojd_declarer"]. 
                "</td><td class=\"date\">" . $row["ojd_declarationdate"]. 
                "</td><td class=\"found\">
                <img class=\"foundImg\" onclick=\"foundObject(this);\" src=\"../src/found.png\" alt=\"found.png\"></td>
                <td class=\"id\">" . $row["obj_id"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results<br>";
    }
?>

	<h1 class="result"></h1>
	
    <script>
        function foundObject(obj) {
			if (confirm('Cet objet est bien trouvé ? Le système va supprimer les données de cet objet.')) {
			// Delete it!
			var rowIndex = obj.parentNode.parentNode.rowIndex;
            //("row index = " + rowIndex);
            var obj_id = document.getElementById("table_declared").rows[rowIndex].cells.item(6).innerHTML;
            //var clickBtnValue = $(this).val();
            var ajaxurl = './includes/delete_objet_ajax.inc.php';
            var data = {
                'obj_id': obj_id
            };
            $.post(ajaxurl, data, function(response) {
                // Response div goes here.
				document.getElementById("table_declared").rows[rowIndex].remove();
                alert("Objet supprimé.");
                $(".result").html(response);
				
            });
			} else {
			// Do nothing!
			}
            
        };

    </script>