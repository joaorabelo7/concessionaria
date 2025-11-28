<?php if(isset($_GET['erro'])): ?>
  <script>alert('Login ou senha incorreto');</script>
<?php endif; ?>
<!-- exibe o alerta se houver erro de login -->
<!-- o endif é uma maneira de fechar estruturas if no PHP, especialmente útil quando você está misturando PHP com HTML -->


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AutoDrive - Test Drive de Veículos</title>
  <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
  <header>
    <div class="logo">🚗 AutoDrive</div> <!-- logo e nome da empresa -->
    <nav>
      <ul>
        <li><a href="index.php" class="active">Início</a></li> <!-- navegação principal -->
        <li><a href="login.php">Login</a></li> <!-- acesso ao sistema -->
        <li><a href="#sobre">Sobre</a></li> <!-- olink interno para seção sobre -->
      </ul>
    </nav>
  </header>

  <section class="hero">
    <div class="hero-content">
      <h1>Experimente a emoção de dirigir o carro dos seus sonhos!</h1> <!-- chamada principal -->
      <p>Agende seu test drive com facilidade e descubra o prazer de estar no controle.</p> <!-- subtítulo -->
      <a href="login.php" class="btn">Agendar Test Drive</a> <!-- call-to-action principal -->
    </div>
  </section>

  <section id="sobre" class="sobre">
    <h2>Sobre a AutoDrive</h2> <!-- seção institucional -->
    <p>
      A <strong>AutoDrive</strong> oferece uma experiência moderna e prática para agendar test drives.
      Explore diversos modelos, escolha o que combina com você e venha sentir a diferença.
    </p>

    <div class="cards">
      <div class="card">
<<<<<<< HEAD
        <img src="assets/img/carro1.webp" alt="Carro esportivo">
        <h3>Modelos Exclusivos</h3>
=======
        <img src="img/carro1.jpeg" alt="Carro esportivo"> <!-- Imagem ilustrativa -->
        <h3>Modelos Exclusivos</h3> <!-- Vantagem 1 -->
>>>>>>> 30fb1aba560f2ef8396de1cfa9ee8d7f8e541cf3
        <p>Escolha entre os carros mais desejados do mercado.</p>
      </div>

      <div class="card">
<<<<<<< HEAD
        <img src="assets/img/interior.jpeg" alt="Interior de carro">
        <h3>Experiência Única</h3>
=======
        <img src="img/carro2.jpeg" alt="Interior de carro"> <!-- imagem ilustrativa -->
        <h3>Experiência Única</h3> <!-- vantagem 2 -->
>>>>>>> 30fb1aba560f2ef8396de1cfa9ee8d7f8e541cf3
        <p>Teste antes de decidir, sinta o desempenho e conforto.</p>
      </div>

      <div class="card">
<<<<<<< HEAD
        <img src="assets/img/bmw.jpg" alt="BMW preta">
        <h3>Agendamento Simples</h3>
=======
        <img src="img/carro3.jpeg" alt="BMW preta"> <!-- imagem ilustrativa -->
        <h3>Agendamento Simples</h3> <!-- vantagem 3 -->
>>>>>>> 30fb1aba560f2ef8396de1cfa9ee8d7f8e541cf3
        <p>Faça tudo online em poucos cliques.</p>
      </div>
    </div>
  </section>

  <footer>
    <p>© 2025 AutoDrive. Todos os direitos reservados.</p> <!-- rodapé com copyright -->
  </footer>
</body>
</html>
