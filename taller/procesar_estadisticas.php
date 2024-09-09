<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados Estadísticos</title>
</head>
<body>
    <h1>Resultados Estadísticos</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $numeros = $_POST['numeros'];

        $numeros_array = array_map('floatval', explode(',', $numeros));

        $media = array_sum($numeros_array) / count($numeros_array);

        sort($numeros_array);
        $n = count($numeros_array);
        $mediana = ($n % 2 == 0) ? ($numeros_array[$n / 2 - 1] + $numeros_array[$n / 2]) / 2 : $numeros_array[floor($n / 2)];

        $suma_cuadrados = 0;
        foreach ($numeros_array as $numero) {
            $suma_cuadrados += pow($numero - $media, 2);
        }
        $desviacion_estandar = sqrt($suma_cuadrados / $n);

        echo "<p>Media: " . number_format($media, 2) . "</p>";
        echo "<p>Mediana: " . number_format($mediana, 2) . "</p>";
        echo "<p>Desviación Estándar: " . number_format($desviacion_estandar, 2) . "</p>";
    } else {
        echo "<p>No se han ingresado números.</p>";
    }
    ?>

    <br><br>
    <a href="calcular_estadisticas.html">Volver</a>
</body>
</html>

