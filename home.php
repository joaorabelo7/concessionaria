<?php
session_start();
require_once 'conexao.php';

// Verifica login
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$tipo_usuario = $_SESSION['tipo'];

// Buscar veículos no banco
$sql = "SELECT * FROM veiculos ORDER BY id DESC";
$stmt = $pdo->query($sql);
// $stmt é a variável que armazena um objeto do tipo PDOStatement que é o resultado do prepare()
$veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>AutoDrive - Veículos</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>

<header class="header">
    <div class="logo">AutoDrive</div>

    <nav>
        <?php if ($tipo_usuario === 'admin'): ?>
            <a href="adicionar_veiculo.php" class="btn-admin">Adicionar Veículo</a>
<<<<<<< HEAD
            <a href="ver_agendamentos.php" class="btn-admin">Ver Agendamentos</a>

=======
        <!-- edif é uma sintaxe alternativa do PHP para fechar estruturas if quando misturadas com html -->
>>>>>>> 30fb1aba560f2ef8396de1cfa9ee8d7f8e541cf3
        <?php endif; ?>

        <a href="logout.php" class="btn-sair">Sair</a>
    </nav>
</header>

<section class="banner">
    <h1>Escolha seu próximo Test Drive</h1>
    <p>Os melhores veículos selecionados especialmente para você.</p>
</section>

<main>
    <h2 class="titulo-home">Veículos Disponíveis</h2>

    <div class="carros-container">

<?php foreach ($veiculos as $v): ?> 
    <div class="car-card">

        <img src="uploads/<?php echo $v['imagem']; ?>" alt="<?php echo $v['modelo']; ?>">

        <h3><?php echo $v['modelo']; ?></h3>

        <!-- BOTÃO DE DISPONIBILIDADE -->
        <div class="status-veiculo">
            <?php if ($v['disponivel'] == 1): ?>
                <button style="
                    background: #28a745;
                    color: white;
                    padding: 6px 10px;
                    border: none;
                    border-radius: 5px;
                    margin-bottom: 10px;
                ">
                    Disponível
                </button>
            <?php else: ?>
                <button style="
                    background: #dc3545;
                    color: white;
                    padding: 6px 10px;
                    border: none;
                    border-radius: 5px;
                    margin-bottom: 10px;
                ">
                    Indisponível
                </button>
            <?php endif; ?>
        </div>

        <div class="acoes-card">

        <?php if ($tipo_usuario === 'cliente'): ?>

            <?php if ($v['disponivel'] == 1): ?>
                <a href="agendamento.php?id=<?php echo $v['id']; ?>" class="btn-agendar">
                    Agendar Test Drive
                </a>
            <?php else: ?>
                <button disabled style="
                    background:#aaa;
                    cursor:not-allowed;
                    padding: 6px 10px;
                    border:none;
                    border-radius: 5px;
                ">
                    Indisponível para agendar
                </button>
            <?php endif; ?>

        <?php else: ?>

            <a href="editar_veiculo.php?id=<?php echo $v['id']; ?>" class="btn-editar">Editar</a>

            <a href="apagar_veiculo.php?id=<?php echo $v['id']; ?>" class="btn-excluir"
                onclick="return confirm('Confirmar exclusão?')">
                Excluir
            </a>

        <?php endif; ?>

        </div>

    </div>
<?php endforeach; ?>

    </div>
</main>

<footer>
    <p>© 2025 AutoDrive - Todos os direitos reservados.</p>
</footer>

</body>
<<<<<<< HEAD
=======

>>>>>>> 30fb1aba560f2ef8396de1cfa9ee8d7f8e541cf3
</html>
