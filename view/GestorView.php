<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>OUTDOORS</title>
        <link rel="stylesheet" href="../content/bootstrap/css/bootstrap.min.css"/>
        <link href="../content/css/style.css" rel="stylesheet" type="text/css" media="screen"/> 
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand title" href="#" style="margin-left: 20px;">Gestor</a>
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
                        <a class="nav-link" href="#" data-target="#listAdminModal">Listar Admin</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#listManagerModal">Listar Gestor</a>
                    </li>


                </ul>
            </div>
        </nav>

        <!-- Modal para a tela de adicionar um Admin -->
        <div class="modal" id="addAdminModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST">
                            <table class='table table-bordered table-responsive'>
                                <br/>
                                <tr>
                                    <td>Nome</td>
                                    <td><input type="text" name="nome" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" name="email" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Comuna</td>
                                    <td>
                                        <select name="comuna" class="form-control">
                                            <option   >Viana</option>
                                        </select>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>Municipio</td>
                                    <td>
                                        <select name="municipio" class="form-control">
                                            <option   >Viana</option>
                                        </select>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>Provincia</td>
                                    <td>
                                        <select name="provincia" class="form-control">
                                            <option   >Luanda</option>
                                        </select>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>Morada</td>
                                    <td><input type="text" name="morada" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Contacto</td>
                                    <td><input type="text" name="contacto" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="username" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="text" name="password" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Confirm Password</td>
                                    <td><input type="text" name="confirm_password" class="form-control" ></td>
                                </tr>
                            </table>  
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para a tela de adicionar um Gestor -->
        <div class="modal" id="addManagerModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="POST">
                            <table class='table table-bordered table-responsive'>
                                <br/>
                                <tr>
                                    <td>Nome</td>
                                    <td><input type="text" name="nome" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" name="email" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Comuna</td>
                                    <td>
                                        <select name="comuna" class="form-control">
                                            <option   >Viana</option>
                                        </select>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>Municipio</td>
                                    <td>
                                        <select name="municipio" class="form-control">
                                            <option   >Viana</option>
                                        </select>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>Provincia</td>
                                    <td>
                                        <select name="provincia" class="form-control">
                                            <option   >Luanda</option>
                                        </select>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>Morada</td>
                                    <td><input type="text" name="morada" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Contacto</td>
                                    <td><input type="text" name="contacto" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="username" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="text" name="password" class="form-control" ></td>
                                </tr>
                                <tr>
                                    <td>Confirm Password</td>
                                    <td><input type="text" name="confirm_password" class="form-control" ></td>
                                </tr>
                            </table>  
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Registrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para a tela de validar um User -->
        <div class="modal" id="validateUserModal" tabindex="-1" role="dialog">
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

        <!-- Modal para a tela de listar um Admin -->
        <div class="modal" id="listAdminModal" tabindex="-1" role="dialog">
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

        <!-- Modal para a tela de listar um Gestor -->
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

        <script src="../scripts/bootstrap/css/bootstrap.min.js"></script>
        <script src="../scripts/custom/app.js"></script>
    </body>
</html>