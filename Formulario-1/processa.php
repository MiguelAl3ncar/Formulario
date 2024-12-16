<?php
// Arquivo: processa.php

// Capturando dados do formulário via método POST
$nome = $_POST['nome'] ?? '';
$idade = $_POST['idade'] ?? '';
$genero = $_POST['genero'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';
$condicao_medica = $_POST['condicao_medica'] ?? '';

// Validando os campos obrigatórios
if (empty($nome) || empty($idade) || empty($genero) || empty($email) || empty($telefone) || empty($condicao_medica)) {
    die("<h1>Erro: Todos os campos são obrigatórios!</h1>");
}

// Conectando ao banco de dados (Exemplo usando MySQLi)
$conn = new mysqli('localhost', 'usuario', 'senha', 'sistema_saude');

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

// Preparando e executando a inserção no banco de dados
$sql = "INSERT INTO pacientes (nome, idade, genero, email, telefone, condicao_medica) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sissss', $nome, $idade, $genero, $email, $telefone, $condicao_medica);

if ($stmt->execute()) {
    echo "<h1>Cadastro realizado com sucesso!</h1>";
    echo "<p>Obrigado por cadastrar no nosso sistema de saúde. Seus dados foram armazenados com segurança.</p>";
    echo "<a href='index.html'>Voltar à página inicial</a>";
} else {
    echo "<h1>Erro ao cadastrar!</h1>";
    echo "<p>Ocorreu um erro ao tentar salvar seus dados. Tente novamente mais tarde.</p>";
}

// Fechando a conexão
$stmt->close();
$conn->close();
?>
