<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/AdminController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/LocalidadeController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/User.php';
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>OUTDOORS</title>
        <link rel="stylesheet" href="../content/bootstrap/css/bootstrap.min.css"/>
        <link href="../content/css/style.css" rel="stylesheet" type="text/css" media="screen"/> 
        <link href="../content/bootstrap/fonts/fontawesome.css" rel="stylesheet" type="text/css" media="screen"/>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand title" href="#" style="margin-left: 20px;">Admin</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#validateUserModal">Validar User</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#addAdminModal">Add Admin</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#addManagerModal">Add Gestor</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#listAdminModal">Listar Users</a>
                    </li>

                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="../actions/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Modal para a tela de adicionar um Admin -->
        <div class="modal" id="addAdminModal" tabindex="-1" role="dialog">
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
                                <input type="hidden" name="tipo" value="admin">

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
                                    <td><input type="text" name="password" class="form-control" placeholder="Password" required></td>

                                    <td><input type="text" name="confirmPassword" class="form-control" placeholder="Confirm Password" ></td>
                                </tr>
                            </table> 
                            <button type="submit" class="btn btn-success" name="add_admin">Registrar</button>
                        </form>
                        <?php
                        if (isset($_POST["add_admin"])) {

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
                            echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para a tela de adicionar um Gestor -->
        <div class="modal" id="addManagerModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5>Adicionar Gestor</h5>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <table class='table table-bordered table-responsive'>
                                <br/>
                                <tr>
                                <input type="hidden" name="tipo" value="gestor">

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
                                    <td><input type="text" name="password" class="form-control" placeholder="Password" required></td>

                                    <td><input type="text" name="confirmPassword" class="form-control" placeholder="Confirm Password" ></td>
                                </tr>
                            </table> 
                            <button type="submit" class="btn btn-success" name="add_gestor">Registrar</button>
                        </form>
                        <?php
                        if (isset($_POST["add_gestor"])) {
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
                            echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para a tela de validar um User -->
        <div class="modal" id="validateUserModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5>Ativar Conta Cliente</h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contacto</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($adminController->showCliente() as $user) {
                                        echo "<tr>";
                                        echo "<td>" . $user->getId() . "</td>";
                                        echo "<td>" . $user->getUsername() . "</td>";
                                        echo "<td>" . $user->getEmail() . "</td>";
                                        echo "<td>" . $user->getContacto() . "</td>";

                                        $estado = $adminController->getClienteEstado($user->getId());

                                        echo '<td>';
                                        echo "<form method='POST'>";
                                        echo "<input type='hidden' value='" . $user->getId() . "' name='userId'>";

                                        if ($estado == 'Aprovado') {
                                            echo "<input type='submit' name='bloquear_conta' class='btn btn-danger' value='Bloquear'></input>";
                                        } else {
                                            echo "<input type='submit' name='ativar_conta' class='btn btn-success' value='Ativar'></input>";
                                        }

                                        echo "</form>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            if (isset($_POST['ativar_conta'])) {
                                $clientId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
                                $adminController->updateClienteEstado($clientId, 'Aprovado');
                                echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                            }
                            ?>

                            <?php
                            if (isset($_POST['bloquear_conta'])) {
                                $clientId = filter_input(INPUT_POST, 'userId', FILTER_SANITIZE_NUMBER_INT);
                                $adminController->updateClienteEstado($clientId, 'Bloqueado');
                                echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal para a tela de listar um Admin -->
        <div class="modal" id="listAdminModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5>Lista dos Admin</h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Comuna</th>
                                        <th scope="col">Municipio</th>
                                        <th scope="col">Provincia</th>
                                        <th scope="col">Morada</th>
                                        <th scope="col">Contacto</th>
                                        <th scope="col">Remover</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($adminController->listarAdmin() as $user):
                                        echo "<tr>";
                                        echo "<td>" . $user->getId() . "</td>";
                                        echo "<td>" . $user->getTipo() . "</td>";
                                        echo "<td>" . $user->getUsername() . "</td>";
                                        echo "<td>" . $user->getEmail() . "</td>";
                                        echo "<td>" . $user->getComuna() . "</td>";
                                        echo "<td>" . $user->getMunicipio() . "</td>";
                                        echo "<td>" . $user->getProvincia() . "</td>";
                                        echo "<td>" . $user->getMorada() . "</td>";
                                        echo "<td>" . $user->getContacto() . "</td>";
                                        echo"<form method='POST'>";
                                        echo "<input type='text' hidden value=" . $user->getId() . " name='userId' class='form-control'>";
                                        echo '<td><input type="submit" name="delete_user" class="btn btn-danger" value="Excluir"></input>';
                                        echo'</form>';
                                        echo "</tr>";
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            if (isset($_POST['delete_user'])) {
                                $adminController->apagarUser($_POST['userId']);
                                $adminController->apagarCliente($_POST['userId']);
                                echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 


        <div class="modal" id="listManagerModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="fas fa-user navbar-toggler" id="taxi-icon"></i>
                        <form method="POST">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="First name">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Last name">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </div>
            </div>
        </div> 

        <div class="logo">

            <p id="o">O</p>
            <p id="l">UTDOORS</p>

        </div>
        <script src="../scripts/jquery/jquery.min.js"></script>
        <script src="../scripts/bootstrap/css/bootstrap.min.js"></script>
        <script src="../scripts/custom/app.js"></script>
        <script src="../scripts/custom/localidade.js"></script>
    </body>
</html>
