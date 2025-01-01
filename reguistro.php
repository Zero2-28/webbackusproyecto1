<?php
$user = "root";
$pass = "";
$host = "localhost";

$connection = mysqli_connect($host, $user, $pass);

$gmail = $_POST["gmail"];
$nombre_usuario = $_POST["nombre_usuario"];
$contraseña = $_POST["contraseña"];

if(!$connection)
        {
            echo "No se ha podido conectar con el servidor" .mysqli_connect_error();
        }
    else
        {
            echo "<b><h3>Hemos conectado al servidor</h3></b>";
        }
        
        $datab = "login";
        $db = mysqli_select_db($connection,$datab);
        if(!$db)
        {
            echo "No se ha podido encontrar la tabla";
        }
        else
        {
            echo "<h3>Tabla selecionada: </h3>";
        }

        $instruccion_SQL = "INSERT INTO tabla (gmail, nombre_usuario, contraseña) 
                                VALUES ('$gmail', '$nombre_usuario', '$contraseña')";


        $resultado = mysqli_query($connection, $instruccion_SQL);

        $consulta = "SELECT * FROM tabla ";

$result = mysqli_query($connection, $consulta);
if(!$result)
{
    echo "No se ha podido realizar la consulta";
}
echo "<table border='1'>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Gmail</th>";
echo "<th>Usuario</th>";
echo "<th>Contraseña</th>";
echo "</tr>";

while ($colum = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $colum["id_usuario"] . "</td>";
    echo "<td>" . $colum["gmail"] . "</td>";
    echo "<td>" . $colum["nombre_usuario"] . "</td>";
    echo "<td>" . $colum["contraseña"] . "</td>";
    echo "</tr>";
}

echo "</table>";


    mysqli_close( $connection );

        echo "<a href='index.html'> Volver atras </a>";


?>