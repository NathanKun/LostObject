<?php
    $conn = new mysqli('localhost', 'root', '', 'LostObjects');

	include "connect_database.inc.php";

    echo "<h3>La liste des objets trouvés</h3>";

    $sql = "SELECT * FROM objectFound_ojf INNER JOIN object_obj ON objectFound_ojf.ojf_obj_id = object_obj.obj_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo"<table id=\"table_found\">
        <tr>
        <th>Nom</th>
        <th>Photo</th>
        <th>Description</th>
        <th class=\"date\">Date de l'ajout</th>
        <th class=\"abandon\">Abandonner</th>
        <th class=\"id\">id</th>";

        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["obj_name"]. 
                "</td><td>
                <a href=\"../src/photo/" . $row["obj_photofilename"] . "\">
                <img class=\"photo\" src=\"../src/photo/" . $row["obj_photofilename"] . "\" alt=\"" . $row["obj_photofilename"] . "\" >" .
                "</a></td><td>" . $row["obj_description"].  
                "</td><td class=\"date\">" . $row["ojf_adddate"]. 
                "</td><td class=\"abandon\">
                <img class=\"deleteImg\" onclick=\"deleteObject(this);\" src=\"../src/delete.png\" alt=\"delete.png\"></td>
                <td class=\"id\">" . $row["obj_id"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results<br>";
    }
?>
    <h1 class="result"></h1>

    <script>
        function deleteObject(obj) {
			if (confirm('Vous voulez supprimer cet objet?')) {
			// Delete it!
			var rowIndex = obj.parentNode.parentNode.rowIndex;
            //("row index = " + rowIndex);
            var obj_id = document.getElementById("table_found").rows[rowIndex].cells.item(5).innerHTML;
            //var clickBtnValue = $(this).val();
            var ajaxurl = './includes/delete_objet_ajax.inc.php';
            var data = {
                'obj_id': obj_id
            };
            $.post(ajaxurl, data, function(response) {
                // Response div goes here.
				document.getElementById("table_found").rows[rowIndex].remove();
                alert("Objet supprimé.");
                $(".result").html(response);
				
            });
			} else {
			// Do nothing!
			}
            
        };

    </script>
