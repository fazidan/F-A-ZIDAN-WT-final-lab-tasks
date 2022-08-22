<?php

$_SESSION['user'] = $name;

if (isset($_POST['logClick'])) {

    if (!empty($_POST["remember"])) {
        setcookie("name", $name, time() + 180);
        setcookie("pass", $pass, time() + 180);
    }

    $current_data = file_get_contents('model/userdata.json');
    $array_data = json_decode($current_data, false);
    $f = 0;

    $c_role = "";

    foreach ($array_data as $b) {
        if ($b->name == $name && $b->pass == $pass) {
            $f = 1;
            $c_role = $b->role;
        }
    }


    if ($f == 0) {
        // echo "<small align='center' style='color:red;'> <b>This user is not found in the system.</b> </small>";
    } else {
        if ($c_role == "Admin") {
            header("Location: adduser.php");
        }
    }
}

if (isset($_POST['regClick'])) {
    header("Location: registration.php");
}