<?php
    $conn = new mysqli('localhost', 'root', '', 'ObjetsPerdus');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "Connection failed: $conn";
    } 

    echo "<h3>La liste des objets trouvés</h3>";

    $sql = "SELECT * FROM objectFound_ojf INNER JOIN object_obj ON objectFound_ojf.ojf_obj_id = object_obj.obj_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo"<table id=\"table\">
        <tr>
        <th>Nom</th>
        <th>Photo</th>
        <th>Description</th>
        <th class=\"date\">Date de l'ajout</th>
        <th class=\"abandonner\">Abandonner</th>
        <th class=\"id\">id</th>";

        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["obj_name"]. 
                "</td><td>
                <a href=\"http://www.w3schools.com\">
                <img class=\"photo\" src=\"../src/photo/" . $row["obj_photofilename"] . "\" alt=\"" . $row["obj_photofilename"] . "\" >" .
                "</a></td><td>" . $row["obj_description"].  
                "</td><td class=\"date\">" . $row["ojf_adddate"]. 
                "</td><td class=\"abandonner\">
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
            var rowIndex = obj.parentNode.parentNode.rowIndex;
            alert("row index = " + rowIndex);
            var obj_id = document.getElementById("table").rows[rowIndex].cells.item(5).innerHTML;
            //var clickBtnValue = $(this).val();
            var ajaxurl = './includes/delete_found_objet_ajax.inc.php';
            var data = {
                'obj_id': obj_id
            };
            $.post(ajaxurl, data, function(response) {
                // Response div goes here.
                alert("action performed successfully");
                $(".result").html(response);
            });
        };

    </script>
