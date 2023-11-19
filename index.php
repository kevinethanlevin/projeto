<?php
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "nome_do_banco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task'])) {
    $task = $_POST['task'];

    $sql = "INSERT INTO tasks (task_name) VALUES ('$task')";
    if ($conn->query($sql) === TRUE) {
        echo "Tarefa adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar a tarefa: " . $conn->error;
    }
}

$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
$tasks = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tasks[] = $row['task_name'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['task_id'])) {
    $task_id = $_POST['task_id'];

    $sql = "DELETE FROM tasks WHERE id=$task_id";
    if ($conn->query($sql) === TRUE) {
        echo "Tarefa removida com sucesso!";
    } else {
        echo "Erro ao remover a tarefa: " . $conn->error;
    }
}

$conn->close();
?>