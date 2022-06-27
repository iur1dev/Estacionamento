<?php

include("conn.php");

$sql = "SELECT * FROM cliente";
$result = mysqli_query($conn, $sql);

if (isset($_POST['enviar'])) {

    $busca = $_POST['busca'];

    $sql = "SELECT * FROM cliente WHERE nome LIKE '%$busca%' OR email LIKE '%$busca%' OR cpf LIKE '%$busca%' OR cnpj LIKE '%$busca%'";

    $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="money que é good nóis num have" />
    <meta name="author" content="iur1Dev" />
    <title>Valores</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="money.png" type="image/x-icon">
</head>

<body class="sb-nav-fixed">

    <?php include_once("nav.php") ?>

    <!-- body -->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                <form action="diarias.php" method="POST">
                    <div class="input-group mt-4" style="width: 15rem;">
                        <input class="form-control" type="text" name="busca" placeholder="Pesquisar o caloteiro 🔫" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-dark" id="btnNavbarSearch" type="submit" name="enviar">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nome</th>
                            <th scope="col" class="text-center">Receber Valor</th>
                            <th scope="col" class="text-center">Enviar</th>
                            <th scope="col" class="text-center">Adicionar Valor</th>
                            <th scope="col" class="text-center">Enviar</th>
                        </tr>
                    </thead>

                    <form method="POST">
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0) {
                                while ($linha = mysqli_fetch_assoc($result)) {
                            ?>

                                    <tr>
                                        <td onclick="location.href='diarias.php?id=<?php echo $linha['id'] ?>'" class="text-center"><?php echo $linha['nome'] ?></td>
                                        <td class="text-center"><input name="receber" id="receber<?php echo $linha['id'] ?>" type="text"></td>
                                        <td class="text-center"><a href="javascript:void(0);" onclick="clicar1(<?php echo ($linha['id']); ?>)" class="btn btn-dark" name="enviarR">ok</a></td>
                                        <td class="text-center"><input name="mandar" id="mandar<?php echo $linha['id'] ?>" type="text"></td>
                                        <td class="text-center"><a href="javascript:void(0);" onclick="clicar(<?php echo ($linha['id']); ?>)" class="btn btn-dark" name="enviarR">ok</a></td>
                                    </tr>


                            <?php }
                            }
                            mysqli_close($conn); ?>

                        </tbody>
                    </form>
                </table>
            </div>
        </main>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="jquery.mask.js"></script>
    <script src="mask.js"></script>


    <script>
        function clicar1(id) {

            var $id = id;
            var $receber = document.getElementById("receber" + id).value;

            $.ajax({
                url: "salvar.php",
                type: "POST",
                data: "id=" + $id + "&receber=" + $receber,

                success: function(result) {

                    if (result != "") {
                        alert(result);
                    } else {
                        alert("Valor Enviado");
                        document.getElementById("receber" + id).value = ''
                    }
                }
            });
        }

        function clicar(id) {

            var $id = id;
            var $mandar = document.getElementById("mandar" + id).value;

            $.ajax({
                url: "mandar_valor.php",
                type: "POST",
                data: "id=" + $id + "&mandar=" + $mandar,

                success: function(result) {

                    if (result != "") {
                        alert(result);
                    } else {
                        alert("Valor Enviado");
                        document.getElementById("mandar" + id).value = ''
                    }
                }
            });
        }
    </script>

</body>

</html>