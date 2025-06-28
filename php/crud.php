<?php
include 'db_connection.php'; // Incluir el archivo de conexión

// CREATE: Agregar una nueva nota
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_nota'])) {
    $nombreyapellido = $_POST['nombreyapellido'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $nota = $_POST['nota'];
    $fechanota = date("Y-m-d H:i:s"); // Usamos la función Date() de PHP

    $sql = "INSERT INTO notas (nombreyapellido, usuario, email, nota, fechanota) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombreyapellido, $usuario, $email, $nota, $fechanota);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['HTTP_REFERER']); // Redireccionar a la misma página
        exit();
    } else {
        echo "Error al agregar la nota: " . $conn->error;
    }
}

// UPDATE: Editar una nota
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editar_nota'])) {
    $id = $_POST['id_nota'];
    $nota_editada = $_POST['nota_edita'];

    $sql = "UPDATE notas SET nota = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nota_editada, $id);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error al editar la nota: " . $conn->error;
    }
}

// DELETE: Eliminar una nota
if (isset($_GET['eliminar_nota'])) {
    $id = $_GET['eliminar_nota'];

    $sql = "DELETE FROM notas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error al eliminar la nota: " . $conn->error;
    }
}

// READ: Leer todas las notas
function obtenerNotas($conn) {
    $sql = "SELECT * FROM notas ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return null;
    }
}
?>