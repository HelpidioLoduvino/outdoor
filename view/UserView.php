<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/AdminController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/OutdoorController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/LocalidadeController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/User.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Cliente.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Outdoor.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/AlugarOutdoor.php';
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
        $isLoggedIn = isset($_SESSION['cliente']) && $_SESSION['cliente']['tipo'] === 'cliente';
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

                    <?php if ($isLoggedIn): ?>
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="#" data-target="#updateClienteModal">Conta</a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item ml-auto" style="margin-left: 200px;">
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
            foreach ($outdoorController->showOutdoor() as $outdoor):
                $modalId = "solicitarOutdoorModal-" . $index; // Identificador único para cada modal
                echo '<div class="card mr-3" style="width: 20rem; margin-left:20px;">';
                echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($outdoor->getImagem()) . '" alt="card img cap">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $outdoor->getTipoOutdoor() . '</h5>';
                echo '<p class="card-text"><span class="currency">Kz </span>' . $outdoor->getPreco() . '</p>';
                echo '<p class="card-text"><span class="text">Estado: </span>' . $outdoor->getEstado() . '</p>';

                // Verifica se o cliente está logado
                if ($outdoor->getEstado() !== 'Ocupado' && $outdoor->getEstado() !== 'Por Validar Pagamento' && $outdoor->getEstado() !== 'A aguardar Pagamento') {
                    if ($isLoggedIn) {
                        echo '<a href="#" data-target="#' . $modalId . '" class="btn btn-success" alugar_outdoorId="' . $outdoor->getId() . '">Solicitar</a>';
                    } else {
                        echo '<a href="../view/LoginView.php" class="btn btn-success">Solicitar</a>';
                    }
                }

                echo '</div>';
                echo '</div>';

                // Modal Para cada Card
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

                echo '<input type="hidden" name="outdoorId" value="' . $outdoor->getId() . '" >';

                echo '<input type="hidden" name="clienteId" value="' . $_SESSION['cliente']['id'] . '" >';

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
                echo '<button type="submit" class="btn btn-success" name="alugar_outdoor">Confirmar</button>';
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
            <?php
            if (isset($_POST['alugar_outdoor'])) {
                $alugarOutdoor = new AlugarOutdoor();
                $dataInicio = filter_input(INPUT_POST, 'dataInicio', FILTER_SANITIZE_SPECIAL_CHARS);
                $dataFim = filter_input(INPUT_POST, 'dataFim', FILTER_SANITIZE_SPECIAL_CHARS);
                $outdoorId = filter_input(INPUT_POST, 'outdoorId', FILTER_SANITIZE_NUMBER_INT);
                $clienteId = filter_input(INPUT_POST, 'clienteId', FILTER_SANITIZE_NUMBER_INT);
                $alugarOutdoor->setDataInicio($dataInicio);
                $alugarOutdoor->setDataFim($dataFim);
                $alugarOutdoor->setId($outdoorId);
                $outdoorController->aluguerOutdoor($alugarOutdoor, $clienteId);
                $outdoorController->updateOutdoorEstado($outdoorId, 'A aguardar Pagamento');
                echo "<meta http-equiv=\"refresh\" content=\"0;\">";
            }
            ?>
        </div>

        <!-- Modal para a tela de adicionar um User -->
        <div class="modal" id="addClientModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5>Adicionar Cliente</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <table class='table table-bordered table-responsive'>
                                <br/>
                                <tr>
                                <input type="hidden" name="tipo" value="cliente">
                                <input type="hidden" name="estado" value="Por Ativar">
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
                            $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
                            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                            $comuna = filter_input(INPUT_POST, 'comuna', FILTER_SANITIZE_STRING);
                            $municipio = filter_input(INPUT_POST, 'municipio', FILTER_SANITIZE_STRING);
                            $provincia = filter_input(INPUT_POST, 'provincia', FILTER_SANITIZE_STRING);
                            $morada = filter_input(INPUT_POST, 'morada', FILTER_SANITIZE_STRING);
                            $contacto = filter_input(INPUT_POST, 'contacto', FILTER_SANITIZE_STRING);
                            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
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
                            $adminController->inserirUser($user);

                            $cliente = new Cliente();

                            $cliente->setNacionalidade($nacionalidade);
                            $cliente->setTipoCliente($tipoCliente);
                            $cliente->setEstado($estado);

                            if ($tipoCliente === 'Particular') {
                                $atividadeEmpresa = null;
                                $cliente->setAtividadeEmpresa($atividadeEmpresa);
                            } else {

                                $cliente->setAtividadeEmpresa($atividadeEmpresa);
                            }

                            $adminController->addClient($cliente);
                            echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div> 

        <div class="modal" id="consultarOutdoorModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Tipo de Outdoor</th>
                                        <th scope="col">Preco</th>
                                        <th scope="col">Data de Inicio</th>
                                        <th scope="col">Data Do Fim</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($outdoorController->showOutdoorAlugado() as $outdoor):
                                        echo "<tr>";
                                        echo "<td>" . $outdoor->getId() . "</td>";
                                        echo "<td>" . $outdoor->getTipoOutdoor() . "</td>";
                                        echo "<td>" . $outdoor->getPreco() . "</td>";
                                        echo "<td>" . $outdoor->getDataInicio() . "</td>";
                                        echo "<td>" . $outdoor->getDataFim() . "</td>";
                                        echo "</tr>";
                                        $total += $outdoor->getPreco();
                                    endforeach;
                                    echo '<tr>';
                                    echo '<th scope="row">Total Pago:</th>';
                                    echo '<td colspan="4"><span class="currency">Kz </span>' . $total . '<span class="currency">.000,00</span></td>';
                                    echo '</tr>';
                                    ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="carregarPagamentoModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Outdoor Id</th>
                                        <th scope="col">Tipo de Outdoor</th>
                                        <th scope="col">Preco</th>
                                        <th scope="col">Data de Inicio</th>
                                        <th scope="col">Data Do Fim</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalPagar = 0;
                                    foreach ($outdoorController->showOutdoorAlugado() as $outdoor) {
                                        echo "<tr>";
                                        echo "<td>" . $outdoor->getId() . "</td>";
                                        echo "<td>" . $outdoor->getTipoOutdoor() . "</td>";
                                        echo "<td>" . $outdoor->getPreco() . "</td>";
                                        echo "<td>" . $outdoor->getDataInicio() . "</td>";
                                        echo "<td>" . $outdoor->getDataFim() . "</td>";
                                        echo "<td>";
                                        echo "<form method='POST'>";
                                        echo "<input type='hidden' value=" . $outdoor->getId() . " name='outdoorId'>";
                                        echo "<input type='hidden' name='clienteId' value=" . $_SESSION['cliente']['id'] . ">";
                                        echo "<input type='hidden' name='dataInicio' value=" . $outdoor->getDataInicio() . ">";
                                        echo "<input type='hidden' name='dataFim' value=" . $outdoor->getDataFim() . ">";
                                        echo '<td><input type="submit" name="carregar_pagamento" class="btn btn-success" value="Carregar Pagamento"></input></td>';
                                        echo "<td><button type='submit' name='apagar_outdoor' class='btn btn-danger'>Excluir</button></td>";
                                        echo "</form>";
                                        echo "</td>";
                                        echo "</tr>";

                                        $totalPagar += $outdoor->getPreco();
                                    }
                                    echo '<th scope="row">Total a Pagar:</th>';
                                    echo '<td colspan="4"><input type="hidden" name="precoTotal" value="' . $totalPagar . '"><span class="currency">Kz </span>' . $total . '<span class="currency">.000,00</span></td>';
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            if (isset($_POST['carregar_pagamento'])) {
                                $outdoorId = filter_input(INPUT_POST, 'outdoorId', FILTER_SANITIZE_NUMBER_INT);
                                $clienteId = filter_input(INPUT_POST, 'clienteId', FILTER_SANITIZE_NUMBER_INT);
                                $dataInicio = filter_input(INPUT_POST, 'dataInicio');
                                $dataFim = filter_input(INPUT_POST, 'dataFim');
                                $outdoorController->analisarComprovativo($outdoorId, $clienteId, $dataInicio, $dataFim);
                                $outdoorController->updateOutdoorEstado($outdoorId, 'Por Validar Pagamento');
                                $outdoorController->deleteOutdoorAlugado($outdoorId);
                                echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                            }
                            ?>

                            <?php
                            if (isset($_POST['apagar_outdoor'])) {
                                $outdoorId = filter_input(INPUT_POST, 'outdoorId');
                                $outdoorController->deleteOutdoorAlugado($outdoorId);
                                $outdoorController->deleteAnalisarAluguer($outdoorId);
                                $outdoorController->updateOutdoorEstado($outdoorId, 'Disponivel');
                                echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="updateClienteModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <?php
                        $id = $_SESSION['cliente']['id'];

                        if (isset($id)) {
                            $user = $adminController->getIdUser($id);
                            echo '
                                <form method="POST">
                                    
                                    <input type="hidden" name="userId" value="' . $user->getId() . '">
                                        
                                    <input type="hidden" name="tipo" value="' . $user->getTipo() . '">
                                
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" value="' . $user->getNome() . '"><br/><br/>

                                    <label for="email">Email:</label>
                                    <label name="email">' . $user->getEmail() . '</label><br/><br/>
                                        
                                    <label for="username">Username:</label>
                                    <input type="text" name="username" value="' . $user->getUsername() . '"><br/><br/>

                                    <label for="provincia">Provincia:</label>
                                    <label name="provincia">' . $user->getProvincia() . '</label><br/><br/>

                                    <label for="municipio">Municipio:</label>
                                    <label name="municipio">' . $user->getMunicipio() . '</label><br/><br/>

                                    <label for="comuna">Comuna:</label>
                                    <label name="comuna">' . $user->getComuna() . '</label><br/><br/>

                                    <label for="morada">Morada:</label>
                                    <input type="text" name="morada" value="' . $user->getMorada() . '"><br/><br/>

                                    <label for="contacto">Contacto:</label>
                                    <input type="text" name="contacto" value="' . $user->getContacto() . '"><br/><br/>

                                    <button type="submit" class="btn btn-outline-dark" name="editar_cliente">Editar</button>
                                </form>
                            ';
                        }
                        ?>
                    </div>
                    <?php
                    if (isset($_POST['editar_cliente'])) {
                        $user = new User();

                        $id = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
                        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                        //$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                        //$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
                        //$provincia = filter_input(INPUT_POST, 'provincia', FILTER_SANITIZE_STRING);
                        //$municipio = filter_input(INPUT_POST, 'municipio', FILTER_SANITIZE_STRING);
                        //$comuna = filter_input(INPUT_POST, 'comuna', FILTER_SANITIZE_STRING);
                        $morada = filter_input(INPUT_POST, 'morada', FILTER_SANITIZE_STRING);
                        $contacto = filter_input(INPUT_POST, 'contacto', FILTER_SANITIZE_STRING);
                        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);

                        $user->setId($id);
                        $user->setNome($nome);
                        // $user->setEmail($email);
                        // $user->setProvincia($provincia);
                        //$user->setMunicipio($municipio);
                        //$user->setComuna($comuna);
                        $user->setMorada($morada);
                        $user->setContacto($contacto);
                        $user->setUsername($username);

                        $adminController->update($user);
                        echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                    }
                    ?>
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
        <script src="../scripts/custom/updateCliente.js"></script>
    </body>
</html>