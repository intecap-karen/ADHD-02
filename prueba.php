<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Listado de Ciudadanos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" />
    <style>
      body {
        background: linear-gradient(135deg, #a8edea, #fed6e3);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
      h2 {
        font-weight: 700;
        color: #333;
        text-shadow: 0 1px 3px rgba(0,0,0,0.1);
      }
      .table-container {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
      }
      table.table thead {
        background-color: #343a40;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.05em;
      }
      table.table tbody tr:hover {
        background-color: #f8f9fa;
        cursor: pointer;
        transition: background-color 0.2s ease;
      }
      .btn-primary, .btn-success, .btn-danger {
        border-radius: 50px;
        padding: 8px 18px;
        font-weight: 600;
      }
      .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white !important;
      }
      .btn-outline-success:hover {
        background-color: #198754;
        color: white !important;
      }
      .modal-header {
        background: #2563eb;
        color: white;
        border-bottom: none;
      }
      .modal-footer {
        border-top: none;
      }
    </style>
</head>
<body>
<?php
  require_once("procesos_crud/conexion.php");
  $sql = "SELECT * FROM ciudadanos";
  $ejecutar = mysqli_query($conexion,$sql);
?>

<div class="container mt-5 table-container shadow-sm">
    <h2 class="text-center mb-4">Listado de Ciudadanos</h2>

    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-3">
      <a href="../index.php" class="btn btn-primary">
        <i class="bi bi-arrow-left-circle"></i> Regresar
      </a>

      <!-- Botón para abrir modal -->
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus-lg"></i> Agregar Ciudadano
      </button>
    </div>

    <!-- Modal Agregar Ciudadano -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Ciudadano</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <form action="crud_nivel.php" method="post" class="row g-3">
              <div class="col-md-6">
                <label for="dpi" class="form-label">DPI</label>
                <input type="text" name="dpi" id="dpi" class="form-control" required />
              </div>
              <div class="col-md-6">
                <label for="txt_apellido" class="form-label">Apellido</label>
                <input type="text" name="txt_apellido" id="txt_apellido" class="form-control" required />
              </div>
              <div class="col-md-6">
                <label for="txt_nombre" class="form-label">Nombre</label>
                <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" required />
              </div>
              <div class="col-md-6">
                <label for="txt_direccion" class="form-label">Dirección</label>
                <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" required />
              </div>
              <div class="col-md-6">
                <label for="txt_telefono_casa" class="form-label">Teléfono Casa</label>
                <input type="text" name="txt_telefono_casa" id="txt_telefono_casa" class="form-control" required />
              </div>
              <div class="col-md-6">
                <label for="txt_telefono_celular" class="form-label">Teléfono Celular</label>
                <input type="text" name="txt_telefono_celular" id="txt_telefono_celular" class="form-control" required />
              </div>
              <div class="col-md-6">
                <label for="txt_email" class="form-label">Email</label>
                <input type="email" name="txt_email" id="txt_email" class="form-control" required />
              </div>
              <div class="col-md-6">
                <label for="txt_fechanacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" name="txt_fechanacimiento" id="txt_fechanacimiento" class="form-control" required />
              </div>
              <div class="col-md-6">
                <label for="txt_nivel_academico" class="form-label">Nivel Académico</label>
                <input type="text" name="txt_nivel_academico" id="txt_nivel_academico" class="form-control" required />
              </div>
              <div class="col-md-6">
                <label for="txt_cod_municipio" class="form-label">Código de Municipio</label>
                <input type="text" name="txt_cod_municipio" id="txt_cod_municipio" class="form-control" required />
              </div>
              <div class="col-12 mt-3">
                <button type="submit" class="btn btn-success w-100" name="btn_insertar" id="btn_insertar">
                  <i class="bi bi-check-circle"></i> Agregar Ciudadano
                </button>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <table class="table table-hover table-striped align-middle text-center fs-6">
      <thead>
        <tr>
          <th>DPI</th>
          <th>Apellido</th>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Teléfono Casa</th>
          <th>Teléfono Celular</th>
          <th>Email</th>
          <th>Fecha Nac.</th>
          <th>Nivel Acad.</th>
          <th>Código Municipio</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($datos = mysqli_fetch_assoc($ejecutar)) { ?>
          <tr>
            <td><?= htmlspecialchars($datos['dpi']); ?></td>
            <td><?= htmlspecialchars($datos['apellido']); ?></td>
            <td><?= htmlspecialchars($datos['nombre']); ?></td>
            <td><?= htmlspecialchars($datos['direccion']); ?></td>
            <td><?= htmlspecialchars($datos['tel_casa']); ?></td>
            <td><?= htmlspecialchars($datos['tel_movil']); ?></td>
            <td><?= htmlspecialchars($datos['email']); ?></td>
            <td><?= htmlspecialchars($datos['fechanac']); ?></td>
            <td><?= htmlspecialchars($datos['cod_nivel_acad']); ?></td>
            <td><?= htmlspecialchars($datos['cod_muni']); ?></td>
            <td class="d-flex justify-content-center gap-2">
              <form action="crud_muni.php" method="post" class="m-0 p-0">
                <input type="hidden" name="hidden_eli" value="<?= htmlspecialchars($datos['cod_muni']); ?>" />
                <button type="submit" name="btn_eli" class="btn btn-outline-danger" title="Eliminar">
                  <i class="bi bi-trash3-fill"></i>
                </button>
              </form>
              <form action="form_act_muni.php" method="post" class="m-0 p-0">
                <input type="hidden" name="hidden_acta" value="<?= htmlspecialchars($datos['cod_muni']); ?>" />
                <button type="submit" name="btn_act" class="btn btn-outline-success" title="Modificar">
                  <i class="bi bi-pencil-square"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>