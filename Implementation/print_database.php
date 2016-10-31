<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Objets perdus - Index</title>
    <link rel="stylesheet" href="./css/table.css">
</head>

<body>
    <?php
$user=NULL;
$adr=NULL;
$pw=NULL;

require_once "./includes/print_database_functions.inc.php";

print_user_usr();
print_objet_obj();
print_objectDeclared_ojd();
print_objectFound_ojf();

$conn->close();




?>

        <p>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" />
            </a>
        </p>
</body>

</html>
