<?php

include("conn.php");

$bairro_input = "SELECT * FROM bairro";
$res_input = mysqli_query($conn, $bairro_input);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nasc = $_POST['data_nasc'];
    $cpf = $_POST['cpf'];
    $celular = $_POST['celular'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $empresa = $_POST['empresa'];
    $cnpj = $_POST['cnpj'];
    $bairro_cli = $_POST['bairro1'];
    $rua_cli = $_POST['rua_cli'];
    $numero_cli = $_POST['numero_cli'];
    $dia_hora = $_POST['dia_hora'];
    $valor = $_POST['valor'];
    $juros = $_POST['juros'];
    $parc = $_POST['parc'];

    if (!empty($bairro_cli)) {
        $sql = "INSERT INTO cliente(nome,email,data_nasc,cpf,celular,cidade_cli,bairro_cli,rua_cli,numero_cli,
        empresa,cnpj,bairro_id,rua,numero,horario,valor,juros,parcela)
        VALUE ('$nome','$email','$data_nasc','$cpf','$celular','$cidade','$bairro','$rua','$numero','$empresa',
        '$cnpj','$bairro_cli','$rua_cli','$numero_cli','$dia_hora','$valor','$juros','$parc')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Cadastrado com Sucesso')</script>";
        } else {
            echo "erro: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "<script>alert('Escolha o bairro')</script>";
    }
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
    <title>Cadastrar</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <?php include_once("nav.php") ?>

    <!-- body -->

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h2 class="mt-4">Informações Pessoais</h2>
                <form class="row g-3" method="POST" action="cadastro.php">
                    <div class="col-md-4">
                        <label for="inputEmail4" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="inputEmail4" name="nome">
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail3" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail3" name="email">
                    </div>
                    <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Data de Nascimento</label>
                        <input type="text" class="form-control date" id="inputPassword4" name="data_nasc">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress" class="form-label">CPF</label>
                        <input type="text" class="form-control cpf" id="inputAddress" name="cpf">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress2" class="form-label">Celular</label>
                        <input type="text" class="form-control phone_with_ddd" id="inputAddress2" name="celular">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress3" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="inputAddress3" name="cidade">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress4" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="inputAddress4" name="bairro">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress5" class="form-label">Rua</label>
                        <input type="text" class="form-control" id="inputAddress5" name="rua">
                    </div>
                    <div class="col-4">
                        <label for="inputAddress6" class="form-label">Número</label>
                        <input type="number" class="form-control" id="inputAddress6" name="numero">
                    </div>
                    <h2>Informações da Empresa</h2>
                    <div class="col-md-4">
                        <label for="inputCity" class="form-label">Empresa</label>
                        <input type="text" class="form-control" id="inputCity" name="empresa">
                    </div>
                    <div class="col-md-4">
                        <label for="inputCity1" class="form-label">CNPJ</label>
                        <input type="text" class="form-control cnpj" id="inputCity1" name="cnpj">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Bairro</label>
                        <select id="inputState" class="form-select" name="bairro1">
                            <option></option>
                            <?php while ($linha = mysqli_fetch_assoc($res_input)) { ?>
                                <option value="<?php echo $linha['bairro_id'] ?>"><?php echo $linha['nome1'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputZip" class="form-label">Rua</label>
                        <input type="text" class="form-control" id="inputZip" name="rua_cli">
                    </div>
                    <div class="col-md-4">
                        <label for="inputZip1" class="form-label">Número</label>
                        <input type="number" class="form-control" id="inputZip1" name="numero_cli">
                    </div>
                    <div class="col-md-4">
                        <label for="inputZip2" class="form-label">Data - Hora</label>
                        <input type="text" class="form-control" id="inputZip2" Readonly name="dia_hora" value="<?php echo date("d/m/Y - H:i:s") ?>">
                    </div>
                    <h2>Valores</h2>
                    <div class="col-md-4">
                        <label for="valor1" class="form-label">Valor</label>
                        <input type="text" class="form-control" onblur="test()" id="valor1" name="valor">
                    </div>
                    <div class="col-md-4">
                        <label for="valor" class="form-label">Valor com juros</label>
                        <input type="text" class="form-control" readonly id="valor" name="juros">
                    </div>
                    <div class="col-md-4">
                        <label for="parc" class="form-label">Valor das parcelas</label>
                        <input type="text" class="form-control" readonly id="parc" name="parc">
                    </div>
                    <div class="col-12">
                        <div class="form-check mt-4">
                            <input class="form-check-input" type="checkbox" id="gridCheck" name="verificacao">
                            <label class="form-check-label" for="gridCheck">
                                Cliente está ciente que o não pagamento resultará no falecimento do mesmo.
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
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
        function test() {
            let $valor1 = parseFloat(document.getElementById("valor1").value);
            let porc = 20;

            $juros = $valor1 * (porc / 100);
            $final = ($juros + $valor1);
            document.getElementById("valor").value = "R$ "+ $final;

            $finalP = $final / 30;
            document.getElementById("parc").value = "R$ "+ $finalP;
        }
    </script>

</body>

</html>