<?php
$servername = "mysql-munguia32.alwaysdata.net";
$username = "munguia32";
$password = "1029384756Jesus.";
$database = "munguia32_bdcolegio";
$tabla = "registros";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM $tabla";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>";
    // Imprimir encabezados de la tabla
    $row = $result->fetch_assoc();
    foreach ($row as $key => $value) {
        echo "<th>$key</th>";
    }
    echo "</tr>";
    // Volver al principio del resultado
    $result->data_seek(0);
    // Imprimir filas de la tabla
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 resultados";
}

$conn->close();
?>
