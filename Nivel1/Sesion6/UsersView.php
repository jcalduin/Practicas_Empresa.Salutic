<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practica BD</title>
    <link href="bootstrapdist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <script src="bootstrapdist/js/bootstrap.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    -->
    <link href="styles.css" rel="stylesheet" type="text/css"/>
</head>
<body> 
    <div class="card">
        <div class="card-header">
        <h5 class="card-title font-weight-bold">Practica Acceso BD #1</h5>
        </div>

        <div class="card-body">
            
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h5 class="card-title font-weight-bold">Registro de Usuarios</h5>
                        <p class="card-text">
                            <hr>
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputNick">Nick</label>
                                        <input type="text" class="form-control" id="inputNick" value="">
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail">Email</label>
                                        <input type="text" class="form-control" id="inputEmail" value="">
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="inputPassword">Password</label>
                                        <input type="text" class="form-control" id="inputPassword" value="">
                                    </div>
                                </div>
                                
                                
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputName">Name</label>
                                        <input type="text" class="form-control" id="inputName" value="">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="inputAddress">Address</label>
                                        <input type="text" class="form-control" id="inputAddress" value="">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputPhoneNumber">Phone Number</label>
                                        <input type="text" class="form-control" id="inputPhoneNumber" value="">
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="inputDNI">DNI</label>
                                        <input type="text" class="form-control" id="inputDNI" value="">
                                    </div>
                                    
                                </div>


                                <input type="button" class="btn btn-primary float-right miboton" value="Registrar Usuario" onclick="registerUser()">
                            </form>               
                        </p>
                </div>

               

                <div class="col-md-8">
                    <h5 class="card-title font-weight-bold">Listado de Usuarios</h5>
                    <div id="render-table-users">
                        
                        
                    </div>         
                </div>
            </div>  
        </div>


    </div>
    <div class="modal" id="modalView" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Título dinámico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="contenidoModalView"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modalEdit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Título dinámico</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="contenidoModalEdit"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="btn-safe" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

<!-- FOOTER , links a JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="functions.js" type="text/javascript"></script>

</html>
