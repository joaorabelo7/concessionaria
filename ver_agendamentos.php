<?php
session_start();
require_once 'conexao.php';

// Verifica se o usuario e administrador
if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 'admin') {
    die("Acesso negado");
}

// Busca todos os agendamentos junto com dados do usuario e do veiculo
$sql = $pdo->prepare("
    SELECT 
        t.id,                 -- id do agendamento
        u.nome AS usuario,    -- nome do usuario
        v.modelo AS veiculo,  -- modelo do veiculo
        t.data_agendamento,   -- data marcada
        t.horario_agendamento, -- horario marcado
        t.status,             -- status do agendamento
        t.data_solicitacao    -- data em que o pedido foi feito
    FROM test_drives t
    JOIN usuarios u ON u.id = t.id_usuario    -- liga com tabela de usuarios
    JOIN veiculos v ON v.id = t.id_veiculo    -- liga com tabela de veiculos
    ORDER BY t.data_agendamento ASC           -- ordena por data crescente
");
$sql->execute();

// Recebe todos os agendamentos
$agendamentos = $sql->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Agendamentos</title>
    <link rel="stylesheet" href="assets/css/ver_agendamentos.css"> <!-- css separado -->
</head>
<body>

<h1>Agendamentos</h1>

<!-- Tabela que mostra todos os agendamentos -->
<table>
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Veiculo</th>
        <th>Data</th>
        <th>Horario</th>
        <th>Status</th>
        <th>Solicitado em</th>
        <th>Acoes</th> <!-- nova coluna -->
    </tr>

    <!-- Loop que exibe cada agendamento -->
    <?php foreach ($agendamentos as $a): ?>
    <tr>
        <td><?= $a['id'] ?></td>
        <td><?= $a['usuario'] ?></td>
        <td><?= $a['veiculo'] ?></td>
        <td><?= $a['data_agendamento'] ?></td>
        <td><?= $a['horario_agendamento'] ?></td>

        <!-- Classe muda a cor do texto baseado no status -->
        <td class="status <?= $a['status'] ?>">
            <?= ucfirst($a['status']) ?>
        </td>

        <td><?= $a['data_solicitacao'] ?></td>

        <!-- AQUI É O LUGAR CERTO DO BOTAO -->
        <td>
            <a href="cancelar_agendamento.php?id=<?= $a['id'] ?>" class="btn-cancelar">
                Cancelar
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


<!-- Botao para voltar para a pagina inicial -->
<a href="home.php" class="btn-voltar">⟵ Voltar</a>

</body>
</html>
