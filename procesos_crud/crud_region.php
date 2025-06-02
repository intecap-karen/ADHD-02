<?php 
     //vamos a utilizar la conexión existente
        require_once("conexion.php");
    
    //se verifica que los datos vengan del formulario con el 
    //boton con nombre btn_modificar
    if(isset($_POST['btn_modificar'])){
        //recibir datos del formulario
        $codigo = $_POST['txt_codigo'];
        $nombre = $_POST['txt_nombre'];
        $desc = $_POST['txt_desc'];
        $sql = 'UPDATE regiones set nombre="'.$nombre.'", 
                    descripcion="'.$desc.'" WHERE cod_region='.$codigo.';';
        echo $sql;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "Datos modificados";
            //envia a la vista regiones
            header('Location: ../vistas/vista_regiones.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no actualizados<br>". $th;    
        }
    }
     //proceso de eliminar
    if(isset($_POST['btn_eliminar'])){
        $codigo = $_POST['hidden_codigo'];
        $sql = "delete from regiones where cod_region=".$codigo;
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            echo "<br>Datos eliminados";
            header('Location: ../vistas/vista_regiones.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no eliminados guardados<br>". $th;        
        } 
    }

    //proceso de insertar
    if(isset($_POST['btn_insertar'])){
        //variable para cada dato que viene del formulario 
        $codigo = $_POST['txt_codigo'];
        $nombre = $_POST['txt_nombre'];
        $desc = $_POST['txt_desc'];
        echo "Datos de la región:";
        echo "<br>Codigo: ". $codigo;
        echo "<br>Nombre: ". $nombre;
        echo "<br>Descripción: ". $desc;
    
        $sql="insert into regiones(cod_region,nombre,descripcion) 
            values(".$codigo.",'".$nombre."','".$desc."');";
        //ejecutar el sql en la conexión existente
        try {
            $ejecutar = mysqli_query($conexion, $sql);
            //echo "valor de Ejecutar: ". $ejecutar;
            echo "<br>Datos almacenados";
            header('Location: ../vistas/vista_regiones.php');
            exit;
        } catch (Exception $th) {
            echo "<br>Datos no fueron guardados<br>". $th;        
        } 

    }
?>