 <?php
    
  echo " <h1> Docker funcionando ! </h1> ";

  $host = 'db';

  $user = 'root';

  $pass = '1234';

  $db = 'meubanco';

  $conn = new mysqli($host, $user, $pass, $db);

  if ($conn->connect_error) {

  die("Erro: " . $conn->connect_error);

  }

  echo "Conectado ao banco!";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'] ?? '';
    $email   = $_POST['email'] ?? '';

    // Consulta simples (atenção: sem segurança avançada ainda)
    $sql = "SELECT * FROM usuarios WHERE nome='$usuario' AND email='$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $msg = "Login realizado com sucesso!";
    } else {
        $msg = "Usuário ou email inválidos.";
    }
}


$conn = new mysqli('db', 'root', '1234', 'meubanco');

if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}

if (isset($_POST['cadastrar'])) {

    $usuario = $_POST['usuario'];
    $email   = $_POST['email'];

    $sql = "INSERT INTO usuarios (nome, email) VALUES ('$usuario', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar";
    }
}

  ?>
  

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>

<h1>Docker funcionando!</h1>

<h2>Login</h2>

<form method="post">
    <input type="text" name="usuario" placeholder="Nome de usuario" required>
    <br><br>
    <input type="email" name="email" placeholder="Email" required>
    <br><br>
    <!-- Aqui está a correção -->
    <button type="submit">Entrar</button>

    <button type="submit" name="cadastrar">Cadastrar</button>
</form>

  </body>
  </html>