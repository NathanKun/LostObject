<?php

require_once "./includes/connect_database.inc.php";

function print_user_usr(){
    global $conn;
    echo "<h1>user_usr: </h1>";
    $sql = "SELECT * FROM user_usr";
    $result = $conn->query($sql);
        
    if ($result->num_rows > 0) {
        echo"<table>
            <tr><th>usr_id</th>
            <th>usr_name</th>
            <th>usr_pw</th>
            <th>usr_level</th>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["usr_id"]. 
                "</td><td>" . $row["usr_name"]. 
                "</td><td>" . $row["usr_pw"]. 
                "</td><td>" . $row["usr_level"]. 
                "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results<br>";
    }

}

function print_objet_obj(){
    global $conn;
    echo "<h1>\n\n\nobject_obj:</h1>";
    $sql = "SELECT * FROM object_obj";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo"<table>
        <tr><th>obj_id</th>
        <th>obj_name</th>
        <th>obj_description</th>
        <th>obj_adddate</th>
        <th>obj_photofilename</th>
        <th>obj_stat</th>";
    // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["obj_id"]. 
                "</td><td>" . $row["obj_name"]. 
                "</td><td>" . $row["obj_description"]. 
                "</td><td>" . $row["obj_adddate"]. 
                "</td><td>" . $row["obj_photofilename"]. 
                "</td><td>" . $row["obj_stat"]. 
                "</td></tr>";
    }
        echo "</table>";
    } else {
        echo "0 results<br>";
    }
}

function print_objectDeclared_ojd(){
    global $conn;
    echo "<h1>\n\n\nobjectDeclared_ojd:</h1>";
    $sql = "SELECT * FROM objectDeclared_ojd INNER JOIN object_obj ON objectDeclared_ojd.ojd_obj_id = object_obj.obj_id";
    $result = $conn->query($sql);
        
    if ($result->num_rows > 0) {
        echo"<table>
        <tr><th>ojd_id</th>
        <th>ojd_obj_id</th>
        <th>ojd_declarationdate</th>
        <th>ojd_declarer</th>
        <th>obj_id</th>
        <th>obj_name</th>
        <th>obj_description</th>
        <th>obj_photofilename</th>
        <th>obj_stat</th>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["ojd_id"]. 
                "</td><td>" . $row["ojd_obj_id"]. 
                "</td><td>" . $row["obj_adddate"]. 
                "</td><td>" . $row["ojd_declarer"]. 
                "</td><td>" . $row["obj_id"]. 
                "</td><td>" . $row["obj_name"]. 
                "</td><td>" . $row["obj_description"]. 
                "</td><td>" . $row["obj_photofilename"]. 
                "</td><td>" . $row["obj_stat"]. 
                "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results<br>";
    }
}

function print_objectFound_ojf(){
    global $conn;
    echo "<h1>\n\n\nobjectFound_ojf:</h1>";
    $sql = "SELECT * FROM objectFound_ojf INNER JOIN object_obj ON objectFound_ojf.ojf_obj_id = object_obj.obj_id";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo"<table><tr>
        <th>ojf_id</th>
        <th>ojf_obj_id</th>
        <th>ojf_adddate</th>
        <th>ojf_adder</th>
        <th>obj_id</th>
        <th>obj_name</th>
        <th>obj_description</th>
        <th>obj_photofilename</th>
        <th>obj_stat</th>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["ojf_id"].
                "</td><td>" . $row["ojf_obj_id"]. 
                "</td><td>" . $row["obj_adddate"]. 
                "</td><td>" . $row["ojf_adder"]. 
                "</td><td>" . $row["obj_id"]. 
                "</td><td>" . $row["obj_name"]. 
                "</td><td>" . $row["obj_description"]. 
                "</td><td>" . $row["obj_photofilename"]. 
                "</td><td>" . $row["obj_stat"]. 
                "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results<br>";
    }
}
?>
