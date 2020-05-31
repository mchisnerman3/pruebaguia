<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Listado de solicitudes</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
      <link href='https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css' rel="stylesheet" />
      <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
</head>

<body>

<div class="modal fade" id="agregausuario" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formausuario">
          <div class="form-group">
            <div class="floating-label textfield-box">
              <label for="nombre">Nombre</label>
                <input class="form-control" id="nombre" name="nombre" required placeholder="Ingrese el nombre" type="text" >
            </div>
          </div>
          <div class="form-group">
            <div class="floating-label textfield-box">
              <label for="apellido">Apellido</label>
                <input class="form-control" id="apellido" name="apellido" required placeholder="Ingrese el apellido" type="text" >
            </div>
          </div>
          <div class="form-group">
            <div class="floating-label textfield-box">
              <label for="documento">Documento</label>
                <input class="form-control" id="documento" name="documento" required placeholder="Ingrese el documento" type="text">
            </div>
          </div>
          <center><button type="submit" class="btn btn-success" id="finalusuario" name="finalusuario">Finalizar Alta</button></center>
        </form>
        <p id="resuok"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="quitarusuario" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="quita">Quitar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="prueba2" name="prueba2"></p>
      </div>
<div class="form-group col-12">
  <div class="textfield-box">
    <label for="cat6">Motivo</label>
    <textarea class="form-control" id="cat6" name="cat6" required rows="3"></textarea>
  </div>
</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" name="botonrechazar" id="botonrechazar"data-dismiss="modal">Quitar Usuario</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="verdetalle" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ver detalle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="prueba3" name="prueba3"></p>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>

<div class="container">
  <br>
<ul class="nav nav-tabs" id="tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="inicio-tab" data-toggle="tab" href="#inicio" role="tab" aria-selected="true">Usuarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="produ-tab" data-toggle="tab" href="#produ" role="tab" aria-selected="false">Productos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="guias-tab" data-toggle="tab" href="#guias" role="tab" aria-selected="false">Guías</a>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="inicio" role="tabpanel">
<br>

  <table id="tabla1" class="table table-striped table-bordered hover" style="width:100%">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
            </tr>
        </thead>
            </table>
            <button type="button" id="ver" name="ver" class="btn btn-info" disabled="true">Ver Detalle</button>
            <button type="button" id="aprobar" name="aprobar" class="btn btn-primary">Agregar usuario</button>
            <button type="button" id="rechazar" name="rechazar" class="btn btn-danger" disabled="true">Quitar usuario</button>
</div>


<div class="tab-pane fade" id="produ" role="tabpanel">
      <br>
      <table id="tabla2" class="table table-striped table-bordered hover" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre Producto</th>
                <th>Precio</th>
            </tr>
        </thead>
      </table>

              
</div>

<div class="tab-pane fade" id="guias" role="tabpanel">
      <br>
      <table id="tabla3" class="table table-striped table-bordered hover" style="width:100%">
        <thead>
            <tr>
                <th>Nro Guia</th>
            </tr>
        </thead>
      </table>
            <button type="button" id="ver2" name="ver2" class="btn btn-info" disabled="true">Ver Detalle</button>
            <button type="button" id="aguias" name="aguias" class="btn btn-primary">Agregar Guia</button>
              
</div>



</div>

</body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>
<script src="https://kit.fontawesome.com/04dddb7be6.js"></script>
<script src="admin.js"></script>
