<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/AdminController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/LocalidadeController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/User.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Cliente.php';
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>OUTDOORS</title>
        <link rel="stylesheet" href="../content/bootstrap/css/bootstrap.min.css"/>
        <link href="../content/css/style.css" rel="stylesheet"/> 
        <link href="../content/css/clienteStyle.css" rel="stylesheet"/> 
    </head>
    <body>
        <?php
        $isLoggedIn = isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'cliente';
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand title" href="#" style="margin-left: 20px;">
                <div class="logo" >

                    <p id="o">O</p>
                    <p id="l">UTDOORS</p>

                </div>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item ">
                        <a class="nav-link" href="#" data-target="#consultarOutdoorModal">Consultar Outdoor</a>
                    </li>

                    <li class="nav-item ml-auto" style="margin-left: 600px;">
                        <?php if (!$isLoggedIn): ?>
                            <a class="nav-link" href="../view/LoginView.php">Login</a>
                        <?php endif; ?>
                    </li>

                    <li class="nav-item ml-auto">
                        <?php if (!$isLoggedIn): ?>
                            <a class="nav-link" href="#" data-target="#addClientModal">Sign Up</a>
                        <?php endif; ?>
                    </li>

                    <?php if ($isLoggedIn): ?>
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="../actions/logout.php">Logout</a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>
        </nav>

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 h-100" src="../content/images/teste.jpg" alt="First slide">
                </div>
            </div>
        </div>

        <div class="container center">
            <div class="jumbotron center">
                <h1 class="display-4">Outdooor Angola</h1>
                <p class="lead">Outdoor Angola...</p>
                <hr class="my-4">
                <p>Para saber mais sobre a pagina, clique em ABOUT.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">ABOUT</a>
                </p>
            </div> 
        </div>

        <div class="container center d-flex">

            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="../content/images/teste.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Placas Luminosas</h5>
                    <p class="card-text">Kzs 20,000</p>
                    <a href="#" class="btn btn-success">Solicitar</a>
                </div>
            </div>

            <div class="card" style="width: 20rem; margin-left: 20px;">
                <img class="card-img-top" src="../content/images/teste.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Placas Nao Luminosas</h5>
                    <p class="card-text">Kzs 20,000</p>
                    <a href="#" class="btn btn-success">Solicitar</a>
                </div>
            </div>

            <div class="card" style="width: 20rem; margin-left: 20px;">
                <img class="card-img-top" src="../content/images/teste.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Lampoles</h5>
                    <p class="card-text">Kzs 20,000</p>
                    <a href="#" class="btn btn-success">Solicitar</a>
                </div>
            </div>

            <div class="card " style="width: 20rem; margin-left: 20px;">
                <img class="card-img-top" src="../content/images/teste.jpg" alt="Card image cap">
                <div class="card-body card-spacing">
                    <h5 class="card-title">Placas Indicativas</h5>
                    <p class="card-text">Kzs 20,000</p>
                    <a href="#" class="btn btn-success">Solicitar</a>
                </div>
            </div>

            <div class="card" style="width: 20rem; margin-left: 20px;">
                <img class="card-img-top" src="../content/images/teste.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Faixadas</h5>
                    <p class="card-text">Kzs 20,000</p>
                    <a href="#" class="btn btn-success">Solicitar</a>
                </div>
            </div>

        </div>

        <!-- Modal para a tela de adicionar um User -->
        <div class="modal" id="addClientModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5>Adicionar Admin</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <table class='table table-bordered table-responsive'>
                                <br/>
                                <tr>
                                <input type="hidden" name="tipo" value="cliente">

                                <td><input type="text" name="nome" class="form-control" placeholder="Nome" required></td>

                                <td><input type="text" name="email" class="form-control" placeholder="Email" required></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="provincia" id="provinciaSelect" class="form-control">
                                            <option  >-- Provincia --</option>
                                            <?php
                                            $localidadeController->mostrarProvincia();
                                            ?>
                                        </select>  
                                    </td>

                                    <td>
                                        <select name="municipio" id="municipioSelect" class="form-control">
                                            <option >-- Municipio --</option>

                                        </select>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="comuna" id="comunaSelect" class="form-control">
                                            <option   >-- Comuna --</option>
                                        </select>  
                                    </td>

                                    <td><input type="text" name="morada" class="form-control" placeholder="Morada" required></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="contacto" class="form-control" placeholder="Contacto" required></td>

                                    <td><input type="text" name="username" class="form-control" placeholder="Username" required></td>

                                </tr>

                                <tr>
                                    <td>

                                        <select name="tipoCliente" class="form-control" required>
                                            <option>-- Tipo de CLiente --</option>
                                            <option value="Particular">Particular</option>
                                            <option value="Empresa">Empresa</option>
                                        </select> 
                                    </td>


                                    <td><input type="text" name="atividadeEmpresa" class="form-control" placeholder="Atividade da Empresa" required></td>

                                </tr>

                                <tr>
                                    <td><input type="text" name="password" class="form-control" placeholder="Password" required></td>

                                    <td><input type="text" name="confirmPassword" class="form-control" placeholder="Confirm Password" ></td>
                                </tr>

                                <tr>
                                    <td><input type="text" name="nacionalidade" class="form-control" placeholder="Nacionalidade" required></td>
                                </tr>

                            </table> 
                            <button type="submit" class="btn btn-success" name="add_client">Registrar</button>
                        </form>
                        <?php
                        if (isset($_POST["add_client"])) {
                            $user = new User();

                            $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
                            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                            $comuna = filter_input(INPUT_POST, 'comuna', FILTER_SANITIZE_STRING);
                            $municipio = filter_input(INPUT_POST, 'municipio', FILTER_SANITIZE_STRING);
                            $provincia = filter_input(INPUT_POST, 'provincia', FILTER_SANITIZE_STRING);
                            $morada = filter_input(INPUT_POST, 'morada', FILTER_SANITIZE_STRING);
                            $contacto = filter_input(INPUT_POST, 'contacto', FILTER_SANITIZE_STRING);
                            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                            $confirmPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_STRING);
                            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade', FILTER_SANITIZE_STRING);
                            $tipoCliente = filter_input(INPUT_POST, 'tipoCliente', FILTER_SANITIZE_STRING);
                            $atividadeEmpresa = filter_input(INPUT_POST, 'atividadeEmpresa', FILTER_SANITIZE_STRING);

                            $user->setTipo($tipo);
                            $user->setNome($nome);
                            $user->setEmail($email);
                            $user->setComuna($comuna);
                            $user->setMunicipio($municipio);
                            $user->setProvincia($provincia);
                            $user->setMorada($morada);
                            $user->setContacto($contacto);
                            $user->setUsername($username);
                            $user->setPassword($password);
                            $user->setConfirmPassword($confirmPassword);

                            $adminController->inserirUser($user);

                            $cliente = new Cliente();

                            $cliente->setNacionalidade($nacionalidade);
                            $cliente->setTipoCliente($tipoCliente);
                            $cliente->setAtividadeEmpresa($atividadeEmpresa);

                            $adminController->addClient($cliente);

                            echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div> 


        <footer class="footer">
            <p>@2023 author Helpidio Mateus. All Rights Reserved.</p>
        </footer>

        <script src="../scripts/bootstrap/css/bootstrap.min.js"></script>
        <script src="../scripts/custom/cliente.js"></script>
        <script src="../scripts/custom/localidade.js"></script>
    </body>
</html>