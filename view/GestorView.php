<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/OutdoorController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/LocalidadeController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/Outdoor.php';
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>OUTDOORS</title>
        <link rel="stylesheet" href="../content/bootstrap/css/bootstrap.min.css"/>
        <link href="../content/css/style.css" rel="stylesheet" type="text/css" media="screen"/> 
    </head>
    <body>
        <?php
        $isLoggedIn = isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'gestor';
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand title" href="#" style="margin-left: 20px;">Gestor</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#analisarAluguerModal">Analisar Aluguer</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#inserirOutdoorModal">Inserir Outdoor</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#gerirOutdoorModal">Gerir Outdoor</a>
                    </li>


                    <?php if ($isLoggedIn): ?>
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="../actions/logout.php">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>

        <!-- Modal para a tela de inserir um Outdoor -->
        <div class="modal" id="inserirOutdoorModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data">
                            <table class='table table-bordered table-responsive'>
                                <br/>
                                <tr>
                                    <td>
                                        <input type="hidden" name="estado" value="disponivel">

                                        <select name="tipoOutdoor" class="form-control">
                                            <option>-- Tipo de Outdoor --</option>
                                            <option value="Placas Luminosas">Placas Luminosas</option>
                                            <option value="Placas Nao Luminosas">Placas Nao Luminosas</option>
                                            <option value="Lampoles">Lampoles</option>
                                            <option value="Placas Indicativas">Placas Indicativas</option>
                                            <option value="Faixadas">Faixadas</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="preco" class="form-control">
                                            <option>-- Preco --</option>
                                            <option value="10.000,00">10.000,00</option>
                                            <option value="20.000,00">20.000,00</option>
                                            <option value="30.000,00">30.000,00</option>
                                            <option value="40.000,00">40.000,00</option>
                                            <option value="50.000,00">50.000,00</option>
                                        </select>
                                    </td>
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
                                </tr>
                                <tr>
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
                                </tr> 
                                <tr>
                                    <td><input type="file" accept="image/*" name="imagem" class="form-control"></td>
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-success" name="add_outdoor">Inserir</button>
                        </form>
                        <?php
                        if (isset($_POST['add_outdoor'])) {
                            $outdoor = new Outdoor();

                            $tipoOutdoor = filter_input(INPUT_POST, 'tipoOutdoor', FILTER_SANITIZE_STRING);
                            $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
                            $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_EMAIL);
                            $comuna = filter_input(INPUT_POST, 'comuna', FILTER_SANITIZE_STRING);
                            $municipio = filter_input(INPUT_POST, 'municipio', FILTER_SANITIZE_STRING);
                            $provincia = filter_input(INPUT_POST, 'provincia', FILTER_SANITIZE_STRING);

                            $imagem = $_FILES['imagem'];

                            if ($imagem['error'] === UPLOAD_ERR_OK) {
                                // Obter o caminho temporário do arquivo
                                $caminhoTemporario = $imagem['tmp_name'];

                                // Ler o conteúdo do arquivo
                                $conteudo = file_get_contents($caminhoTemporario);

                                $outdoor->setTipoOutdoor($tipoOutdoor);
                                $outdoor->setPreco($preco);
                                $outdoor->setEstado($estado);
                                $outdoor->setProvincia($provincia);
                                $outdoor->setMunicipio($municipio);
                                $outdoor->setComuna($comuna);

                                $outdoor->setImagem($conteudo);

                                $outdoorController->addOutdoor($outdoor);

                                echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para a tela de adicionar um Gestor -->
        <div class="modal" id="analisarAluguerModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Outdoor</th>
                                        <th scope="col">ID Cliente</th>
                                        <th scope="col">Username Cliente</th>
                                        <th scope="col">Tipo de Outdoor</th>
                                        <th scope="col">Preco</th>
                                        <th scope="col">Data de Inicio</th>
                                        <th scope="col">Data Do Fim</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($outdoorController->showOutdoorAlugado() as $outdoor) {
                                        echo "<tr>";
                                        echo "<td>" . $outdoor->getId() . "</td>";
                                        echo "<td>Por Fazer</td>";
                                        echo "<td>Por Fazer</td>";
                                        echo "<td>" . $outdoor->getTipoOutdoor() . "</td>";
                                        echo "<td>" . $outdoor->getPreco() . "</td>";
                                        echo "<td>" . $outdoor->getDataInicio() . "</td>";
                                        echo "<td>" . $outdoor->getDataFim() . "</td>";
                                        echo "</tr>";

                                        $total += $outdoor->getPreco();
                                        if (isset($_POST['validar_pagamento'])) {
                                            $outdoorId = $outdoor->getId();
                                            $outdoorController->updateOutdoorEstado($outdoorId, 'Ocupado');
                                            echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                                        }
                                    }
                                    echo '<th scope="row">Total a Pagar:</th>';
                                    echo '<td colspan="4"><input type="hidden" name="precoTotal" value="' . $total . '"><span class="currency">Kz </span>' . $total . '<span class="currency">.000,00</span></td>';
                                    echo "<form method='POST'>";
                                    echo '<td><input type="submit" name="validar_pagamento" class="btn btn-success" value="Validar Pagamento"></input></td>';
                                    echo '</form>';
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal para a tela de adicionar um Gestor -->
        <div class="modal" id="gerirOutdoorModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <h5>Lista dos Outdoors</h5>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Tipo de Outdoor</th>
                                        <th scope="col">Preco</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Provincia</th>
                                        <th scope="col">Municipio</th>
                                        <th scope="col">Comuna</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($outdoorController->showOutdoor() as $outdoor):
                                        echo "<tr>";
                                        echo "<td>" . $outdoor->getId() . "</td>";
                                        echo "<td>" . $outdoor->getTipoOutdoor() . "</td>";
                                        echo "<td>" . $outdoor->getPreco() . "</td>";
                                        echo "<td>" . $outdoor->getEstado() . "</td>";
                                        echo "<td>" . $outdoor->getProvincia() . "</td>";
                                        echo "<td>" . $outdoor->getMunicipio() . "</td>";
                                        echo "<td>" . $outdoor->getComuna() . "</td>";
                                        echo '<td><a href="#" data-bs-target="#editarUserModal" name="editar" class="btn btn-outline-primary">Editar</a></td>';
                                        echo"<form method='POST'>";
                                        echo "<input type='text' hidden value=" . $outdoor->getId() . " name='id_value' class='form-control'>";
                                        echo '<td><input type="submit" name="outdoorId" class="btn btn-danger" value="Excluir"></input>';
                                        echo'</form>';
                                        echo "</tr>";
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            if (isset($_POST['outdoorId'])) {
                                $outdoorController->apagarOutdoor($_POST['id_value']);
                                echo "<meta http-equiv=\"refresh\" content=\"0;\">";
                            }
                            ?>
                        </div>
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
        <script src="../scripts/custom/gestor.js"></script>
        <script src="../scripts/custom/localidade.js"></script>
    </body>
</html>