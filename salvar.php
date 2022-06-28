<?php

include("conn.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $receber = $_POST['receber'];

    $sql_receber = "UPDATE cliente SET juros = juros - $receber  WHERE id = $id ";

    $receber_final = mysqli_query($conn, $sql_receber);


   
}
