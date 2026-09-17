<?php
// Configurações do banco (com base no que descobrimos)
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "meu_primeiro_banco";
$porta = 3306; // Ajuste para 3308 se seu Wamp estiver usando a 3308

// Criando a conexão usando o driver MySQLi do PHP
$conexao = new mysqli($host, $usuario, $senha, $banco, $porta);

// Testando se a conexão falhou
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

echo "<h1>Clientes cadastrados no banco de dados:</h1>";
echo "<p> teste de atalho </p>";

// Buscando os clientes na tabela
$sql = "SELECT id, nome, email FROM clientes";
$resultado = $conexao->query($sql);

if ($resultado->num_rows > 0) {
    echo "<ul>";
    // Listando cada linha retornada do banco
    while($linha = $resultado->fetch_assoc()) {
        echo "<li><strong>ID:</strong> " . $linha["id"] . " | <strong>Nome:</strong> " . $linha["nome"] . " | <strong>Email:</strong> " . $linha["email"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Nenhum cliente encontrado.";
}

// Fechando a conexão
$conexao->close();
?>
