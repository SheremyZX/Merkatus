<?php    
include "conexion/conexion.php";

if(empty($_POST['producto']) || empty($_POST['descripcion']) || empty($_POST['precio'])){

    // echo "Digite todos los campos";
}else{
    $producto =$_POST['producto'];
    $proveedor =$_POST['proveedor'];
    $categoria =$_POST['categoria'];
    $descripcion =$_POST['descripcion'];
    $precio =$_POST['precio'];
    $imagena = $_FILES['imagen']['tmp_name'];
    $imagen = addslashes(file_get_contents($imagena));
    $query = "INSERT INTO productos (nombrep,proveedor,id_categoria,Descripcion,Precio,imagen) VALUES ('$producto','$proveedor','$categoria','$descripcion','$precio','$imagen')";
    $resultado = $conexion->query($query);

    if($resultado){
        echo "Se han registrado los datos";
        header('location: ../crudProductos/consulta.php');
    }else{
        echo "Datos no guardados";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estiloIngresar.css">
    <title>Ingresar productos</title>
</head>
<body>
    <!-- <center> -->
        <section>
        <div class="formulario">
        <h1 class="titulo">Datos Producto 
            <br>ADMIN</h1>
        <form action="" method="POST" enctype="multipart/form-data" class="formulario">
        <h2>Ingrese los datos del producto</h2>
        <label for="" class="campos">Nombre del producto: </label>
        <input class="entrada" type="text" name="producto"> <br><br>
        <label for="" class="campos">Nombre del proveedor: </label>
        <input class="entrada" type="text" name="proveedor"> <br><br>
        <label for="" class="campos">Categoria: </label>
        <select class="entrada" name="categoria" >
                  <option value="value1" selected >......</option>
                  <option value="1200" >Lacteos</option>
                  <option value="1201">Carnicos</option>
                                    </select><br> <br>
        <label for="" class="campos">Descripción: </label>
        <input  class="entrada" type="text" name="descripcion"><br><br>
        <label for="" class="campos">Precio: </label>
        <input  class="entrada" type="text" name="precio"><br><br>
        <label for="" class="campos">Imágen: </label>
        <input class="entrada" type="file" name="imagen" required=""><br><br>
        <center>
        <input class="boton" type="submit" name="guardar" value="Guardar">
        
        <button class="boton"><a href="../crudProductos/consulta.php">Consultar Productos</a></button>
        </center>
        </form>
        </div>
        </section>
        <img class="gif" src="https://i.kym-cdn.com/photos/images/original/001/866/170/a79.gif" alt="" class="monito">
    <!-- </center> -->
</body>
</html>
