<?php 
include "conexion/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloConsultar.css">
    <title>Datos Producto</title>
</head>
<body>
    <center>
        <h1>Datos guardados</h1>
        <table>
            <tr>
                <th>Id_producto:</th>
                <th>Proveedor:</th>
                <th>Nombre producto:</th>
                <th>Id_categoria:</th>
                <th>Descripcion:</th>
                <th>Precio:</th>
                <th>Imagen:</th>
                <th>Actualizar:</th>
                <th>Eliminar:</th>
            </tr>
            <?php 
            $query = mysqli_query($conexion,"SELECT * FROM productos");
            $resul = mysqli_num_rows($query);
            if ($resul>0){
                while ($data = mysqli_fetch_array($query)){

                    ?>
                <tr>
                    <td><?php echo $data['id_producto'] ?></td>
                    <td><?php echo $data['proveedor'] ?></td>
                    <td><?php echo $data['nombrep'] ?></td>
                    <td><?php echo $data['id_categoria'] ?></td>
                    <td><?php echo $data['descripcion'] ?></td>
                    <td><?php echo $data['precio'] ?></td>
                    <td><img height="100px" src="data:imagen/JPG;base64, <?php echo base64_encode($data['imagen']) ?> "> </td>
                    <?php
                    echo "<td><a class=boton href='indexmodificar.php?id=".$data['id_producto']."'>Actualizar</a></td>";
                    echo "<td><a class=boton href='consulta.php?id=".$data['id_producto']."'>Eliminar</a></td>  </tr>"; 
                    ?>
                </tr>
            <?php
                }
            }
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $sql= mysqli_query($conexion,"delete from productos where id_producto=$id");    
            }
            ?>
        </table>
        
        <button><a href="index.php">Regresar</a></button>
        
    </center>
</body>
</html>