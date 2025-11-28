<?php
session_start();
require_once 'conexao.php';

// Verificações básicas
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'cliente') {
    die("Acesso negado.");
}

if (!isset($_GET['id'])) {
    die("Veículo não especificado.");
}

$veiculo_id = $_GET['id'];

// Busca veículo
$sql = $pdo->prepare("SELECT * FROM veiculos WHERE id = ?");
$sql->execute([$veiculo_id]);
$veiculo = $sql->fetch();

if (!$veiculo) {
    die("Veículo não encontrado.");
}

// Processa agendamento
if ($_POST) {
    $data = $_POST['data'];
    $horario = $_POST['horario'];
    $usuario_id = $_SESSION['id'];

    // Inserir agendamento
    $sql = $pdo->prepare("INSERT INTO test_drives (id_usuario, id_veiculo, data_agendamento, horario_agendamento)
                          VALUES (?, ?, ?, ?)");

    if ($sql->execute([$usuario_id, $veiculo_id, $data, $horario])) {

        // Atualizar status do veículo para 2 (indisponível)
        $update = $pdo->prepare("UPDATE veiculos SET disponivel = 2 WHERE id = ?");
        $update->execute([$veiculo_id]);

        echo "<script>
                alert('Agendamento realizado com sucesso!');
                window.location.href='home.php';
              </script>";
    } else {
        echo "<script>alert('Erro ao fazer agendamento.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Agendar Test Drive</title>
    <link rel="stylesheet" href="assets/css/agendamento.css">
</head>
<body>

    <div class="container">
        <h2>Agendar Test Drive</h2>
        
        <div class="veiculo-info">
            <h3><?php echo $veiculo['modelo']; ?></h3>
            <p>Tipo: <?php echo $veiculo['tipo']; ?></p>
            <p><?php echo $veiculo['descricao']; ?></p>
        </div>

        <form method="POST">
            <label for="data">Data do Test Drive:</label>
            <input type="date" id="data" name="data" required>
            
            <label for="horario">Horário:</label>
            <select id="horario" name="horario" required>
                <option value="">Selecione um horário</option>
                <option value="08:00:00">08:00</option>
                <option value="09:00:00">09:00</option>
                <option value="10:00:00">10:00</option>
                <option value="11:00:00">11:00</option>
                <option value="14:00:00">14:00</option>
                <option value="15:00:00">15:00</option>
                <option value="16:00:00">16:00</option>
                <option value="17:00:00">17:00</option>
            </select>
            
            <button type="submit">Confirmar Agendamento</button>
        </form>
        
        <a href="home.php" class="voltar">← Voltar para Home</a>
    </div>

</body>

</html>
