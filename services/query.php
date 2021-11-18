<?php
// 1. Conexión con la base de datos	
include '../services/connection.php';

// 2. Selección y muestra de datos de la base de datos
$result = mysqli_query($conn, "SELECT Books.Title FROM Books WHERE eBook != '0'");

if (!empty($result) && mysqli_num_rows($result) > 0) {
// datos de salida de cada fila (fila = row)
    while ($row = mysqli_fetch_array($result)) {
    echo "<p>".$row['Title']."</p>";
    }
} else {
    echo "0 resultados";
}
?>