<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $colonia = $_POST['colonia'];
    $municipio = $_POST['municipio'];

    // Manejo de la foto
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si es una imagen
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if ($check === false) {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verificar si el archivo ya existe
    if (file_exists($target_file)) {
        echo "El archivo ya existe.";
        $uploadOk = 0;
    }

    // Limitar el tamaño del archivo
    if ($_FILES["foto"]["size"] > 500000) {
        echo "El archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Limitar el formato del archivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk está en 0 debido a un error
    if ($uploadOk == 0) {
        echo "El archivo no se ha subido.";
    } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO guias (nombre, colonia, municipio, foto) VALUES ('$nombre', '$colonia', '$municipio', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo "Guía turística agregada con éxito.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Hubo un error al subir el archivo.";
        }
    }
    $conn->close();
}
?>
