<?php

$num = 0;
switch ($num) {
    case 0:
        $DB_HOST = "localhost";
        $DB_USER = "root";
        $DB_PASS = "";
        $DB_NAME = "college";
        break;
    case 1:
        $DB_HOST = "localhost";
        $DB_USER = "id18787957_satyammishra007";
        $DB_PASS = "dr!DDDaREW-0L?2I";
        $DB_NAME = "id18787957_college_data";
        break;
}


$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($conn) {
    echo "succesfully connected";
} else {
    echo "not connected
";
}
