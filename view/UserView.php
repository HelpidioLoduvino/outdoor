<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/AdminController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/OutdoorController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/LocalidadeController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/User.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Cliente.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Outdoor.php';
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
                        <?php if ($isLoggedIn): ?>
                            <a class="nav-link" href="#" data-target="#consultarOutdoorModal">Consultar Outdoor</a>
                        <?php else: ?>
                            <a class="nav-link" href="../view/LoginView.php">Consultar Outdoor</a>
                        <?php endif; ?>
                    </li>
                    
                    <li class="nav-item ">
                        <?php if ($isLoggedIn): ?>
                            <a class="nav-link" href="#" data-target="#carregarPagamentoModal">Carregar Pagamento</a>
                        <?php else: ?>
                            <a class="nav-link" href="../view/LoginView.php">Carregar Pagamento</a>
                        <?php endif; ?>
                    </li>

                    <li class="nav-item ml-auto" style="margin-left: 500px;">
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

        <div class="container center d-flex flex-row">
            <?php
            $index = 0;
            foreach ($outdoorController->listarOutdoor() as $outdoor):
                $modalId = "solicitarOutdoorModal-" . $index; // Identificador único para cada modal
                echo '<div class="card mr-3" style="width: 20rem; margin-left:20px;">';
                echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($outdoor->getImagem()) . '" alt="card img cap">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $outdoor->getTipoOutdoor() . '</h5>';
                echo '<p class="card-text"><span class="currency">Kz </span>' . $outdoor->getPreco() . '</p>';
                echo '<p class="card-text"><span class="text">Estado: </span>' . $outdoor->getEstado() . '</p>';

                // Verifica se o cliente está logado
                if ($isLoggedIn) {
                    echo '<a href="#" data-target="#' . $modalId . '" class="btn btn-success">Solicitar</a>';
                } else {
                    echo '<a href="../view/LoginView.php" class="btn btn-success">Solicitar</a>';
                }

                echo '</div>';
                echo '</div>';

                // Modal correspondente para cada card
                echo '<div class="modal fade" id="' . $modalId . '" tabindex="-1" role="dialog">';
                echo '<div class="modal-dialog modal-dialog-centered" role="document">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header justify-content-center">';
                echo '<h5>Solicitar um Outdoor</h5>';
                echo '</div>';
                echo '<div class="modal-body">';

                echo '<form method="POST">';
                echo '<table class="table table-bordered table-responsive">';
                echo '<br/>';

                echo '<tr>';
                echo '<td>';
                echo '<label for="tipoOutdoor" class="form-control">Tipo de Outdoor</label>';
                echo '</td>';
                echo '<td>';
                echo '<label name="tipoOutdoor" class="form-control">' . $outdoor->getTipoOutdoor() . '</label>';
                echo '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>';
                echo '<label for="provincia" class="form-control">Provincia</label>';
                echo '</td>';
                echo '<td>';
                echo '<label name="provincia" class="form-control">' . $outdoor->getProvincia() . '</label>';
                echo '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>';
                echo '<label for="municipio" class="form-control">Municipio</label>';
                echo '</td>';
                echo '<td>';
                echo '<label name="municipio" class="form-control">' . $outdoor->getMunicipio() . '</label>';
                echo '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>';
                echo '<label for="comuna" class="form-control">Comuna</label>';
                echo '</td>';
                echo '<td>';
                echo '<label name="comuna" class="form-control">' . $outdoor->getComuna() . '</label>';
                echo '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>';
                echo '<label for="dataInicio" class="form-control">Data Inicio</label>';
                echo '</td>';
                echo '<td>';
                echo '<input type="date" name="dataInicio" class="form-control" >';
                echo '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>';
                echo '<label for="dataFim" class="form-control">Data Fim</label>';
                echo '</td>';
                echo '<td>';
                echo '<input type="date" name="dataFim" class="form-control" >';
                echo '</td>';
                echo '</tr>';

                echo '</table>';
                echo '<button type="submit" class="btn btn-success" name="add_admin">Confirmar</button>';
                echo '</form>';

                echo '</div>';
                echo '<div class="modal-footer">';
                echo '<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                $index++;
            endforeach;
            ?>
        </div>

        <div class="modal" id="' . $modalId . '" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Modal</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
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
                                        <select name="tipoCliente" id="tipoCliente" class="form-control" required>
                                            <option>-- Tipo de Cliente --</option>
                                            <option value="Particular">Particular</option>
                                            <option value="Empresa">Empresa</option>
                                        </select> 
                                    </td>

                                    <td><input type="text" name="atividadeEmpresa" id="atividadeEmpresa" class="form-control" placeholder="Atividade da Empresa" <?php echo $tipoCliente === 'Particular' ? 'disabled' : ''; ?>></td>


                                </tr>

                                <tr>
                                    <td><input type="text" name="password" class="form-control" placeholder="Password" required></td>

                                    <td><input type="text" name="confirmPassword" class="form-control" placeholder="Confirm Password" ></td>
                                </tr>

                                <tr>
                                    <td>
                                        <select name="nacionalidade" class="form-control" required>
                                            <option>-- Nacionalidade --</option>
                                            <option value="Angolano(a)">Angolano(a)</option>
                                        </select>
                                    </td>
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

                            if ($tipoCliente === 'Particular') {
                                $atividadeEmpresa = null;
                                $cliente->setAtividadeEmpresa($atividadeEmpresa);
                            } else {

                                $cliente->setAtividadeEmpresa($atividadeEmpresa);
                            }

                            $adminController->addClient($cliente);

                            exit();

                            echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div> 
        
        <div class="modal" id="consultarOutdoorModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Modal</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal" id="carregarPagamentoModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Modal</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <p>@2023 author Helpidio Mateus. All Rights Reserved.</p>
        </footer>

        <script src="../scripts/jquery/jquery.min.js"></script>
        <script src="../scripts/bootstrap/css/bootstrap.min.js"></script>
        <script src="../scripts/custom/cliente.js"></script>
        <script src="../scripts/custom/outdoor.js"></script>
        <script src="../scripts/custom/localidade.js"></script>
        <script src="../scripts/custom/alugarOutdoor.js"></script>
        <script src="../scripts/custom/hideAtividadeEmpresa.js"></script>
    </body>
</html>