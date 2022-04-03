<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","rol");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //administrador
    header("location:./Gerente/admintiendas.html");

}else
if($filas['id_tienda']==2){ //Tienda 2
header("location:./Tiendas/tienda02.html");
}
if($filas['id_tienda']==3){ //Tienda 3
    header("location:./Tiendas/tienda03.html");
    }
    if($filas['id_tienda']==12){ //Tienda 12
        header("location:./Tiendas/tienda12.html");
        }
        if($filas['id_tienda']==16){ //Tienda 16
            header("location:./Tiendas/tienda16.html");
            }
            if($filas['id_tienda']==23){ //Tienda 23
                header("location:./Tiendas/tienda23.html");
                }

else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
