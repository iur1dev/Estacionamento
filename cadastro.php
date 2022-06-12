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

    if(isset($bairro_cli)){
        $sql = "INSERT INTO cliente(nome,email,data_nasc,cpf,celular,cidade_cli,bairro_cli,rua_cli,numero_cli,
        empresa,cnpj,bairro_id,rua,numero,horario,valor)
        VALUE ('$nome','$email','$data_nasc','$cpf','$celular','$cidade','$bairro','$rua','$numero','$empresa',
        '$cnpj','$bairro_cli','$rua_cli','$numero_cli','$dia_hora','$valor')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Cadastrado com Sucesso')</script>";

        //  header('location:index.php');

    } else {
        echo "erro: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    }else {
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
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">💰🤑💸</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Pesquisar o caloteiro 🔫" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="cadastro.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Cadastro
                        </a>
                        <a class="nav-link" href="busca.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Pesquisar
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-columns"></i>
                            </div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-book-open"></i>
                            </div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-chart-area"></i>
                            </div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4 mb-4">Cadastro</h1>

                    <h1>Informações Pessoais</h1>
                    <form class="row g-3" method="POST" action="cadastro.php">
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="inputEmail4" name="nome">
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" name="email">
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
                            <label for="inputAddress2" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="inputAddress2" name="cidade">
                        </div>
                        <div class="col-4">
                            <label for="inputAddress2" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="inputAddress2" name="bairro">
                        </div>
                        <div class="col-4">
                            <label for="inputAddress2" class="form-label">Rua</label>
                            <input type="text" class="form-control" id="inputAddress2" name="rua">
                        </div>
                        <div class="col-4">
                            <label for="inputAddress2" class="form-label">Número</label>
                            <input type="number" class="form-control" id="inputAddress2" name="numero">
                        </div>
                        <h1>Informações da Empresa</h1>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">Empresa</label>
                            <input type="text" class="form-control" id="inputCity" name="empresa">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">CNPJ</label>
                            <input type="text" class="form-control cnpj" id="inputCity" name="cnpj">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">Bairro</label>
                            <select id="inputState" class="form-select" name="bairro1">
                                <option></option>
                                <?php while ($linha = mysqli_fetch_assoc($res_input)) { ?>
                                    <option value="<?php echo $linha['bairro_id'] ?>"><?php echo $linha['nome'] ?></option>
                                <?php  } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Rua</label>
                            <input type="text" class="form-control" id="inputZip" name="rua_cli">
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Número</label>
                            <input type="number" class="form-control" id="inputZip" name="numero_cli">
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Data - Hora</label>
                            <input type="text" class="form-control" id="inputZip" Readonly name="dia_hora" value="<?php echo date("d/m/Y - H:i:s") ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputZip" class="form-label">Valor</label>
                            <input type="text" class="form-control money" id="inputZip" name="valor">
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
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
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

</body>

</html>