<?php

include("conn.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $mandar = $_POST['mandar'];

    $juros = 20;

    $sql_mandar = "UPDATE cliente SET juros = juros + $mandar * ($juros/100) + $mandar  WHERE id = $id";
    $mandar_final = mysqli_query($conn, $sql_mandar);

    $sql_mandar1 = "UPDATE cliente SET valor = valor + $mandar  WHERE id = $id";
    $mandar_final1 = mysqli_query($conn, $sql_mandar1);

    $sql_mandar2 = "UPDATE cliente SET parcela = parcela + ($mandar * ($juros/100) + $mandar )/30 WHERE id = $id";
    $mandar_final2 = mysqli_query($conn, $sql_mandar2);
}
