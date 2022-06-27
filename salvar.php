<?php

include("conn.php");

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $receber = $_POST['receber'];

    $sql_receber = "UPDATE cliente SET juros = juros - $receber  WHERE id = $id ";

    $receber_final = mysqli_query($conn, $sql_receber);


    $verificar_valor = "SELECT juros FROM cliente";
    $verificar_final = mysqli_query($conn, $verificar_valor);
    echo "<script>alert($verificar_final)</script>";
    if ($verificar_valor <= 0) {
        echo "<script>alert('zerou')</script>";
    }
}
