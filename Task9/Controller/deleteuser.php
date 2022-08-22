<?php 

require_once '../model/model.php';

if (deleteStudent($_GET['id'])) {
    header('Location: ../showAllStudents.php');
}

 ?>
Footer
© 2022 GitHub, Inc.
Footer navigation
Te