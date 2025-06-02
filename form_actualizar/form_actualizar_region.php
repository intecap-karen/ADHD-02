<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Regiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/regiones.css">
</head>
<body>
    <?php 
        $codigo = $_POST['hidden_codigoa'];
        //buscar el codigo en la base de datos en la tabla de regiones
        require_once("../procesos_crud/conexion.php");
        $sql="select * from regiones where cod_region=".$codigo;
        //ejecutar la consulta en la base de datos utilizando
        //la conexión realizada
        $ejecutar =mysqli_query($conexion, $sql);
        //convierte los datos a un array de php
        $datos = mysqli_fetch_assoc($ejecutar);
        //print_r($datos);
        //echo $datos['nombre'];
        ?>
    <div class="container">
        <h1>Modificar Región</h1>
        <!--crud_region.php es el archivo que realizara los procesos 
        crud en la bd-->
        <form action="../procesos_crud/crud_region.php" method="post">
            <label for="txt_codigo" class="form-label">Código</label>
            <input type="number" name="txt_codigo" id="txt_codigo" 
                value="<?php echo $codigo;?>" class="form-control" 
                readonly>
            <label class="form-label" for="txt_nombre">Nombre</label>
            <input type="text" name="txt_nombre" id="txt_nombre" 
                value="<?php echo $datos['nombre'];?>" 
                class="form-control">
            <label for="txt_desc" class="form-label">Descripción</label>
            <input type="text" name="txt_desc" id="txt_desc" 
                value="<?= $datos['descripcion']?>"
                class="form-control">
            <button type="submit" class="form-control btn btn-primary"
                name="btn_modificar" id="btn_modificar">
                Modificar Región</button>
        </form>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script src="../js/regiones.js"></script>
</body>
</html>