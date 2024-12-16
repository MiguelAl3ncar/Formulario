<?php
// Arquivo: dados_cadastrados.php

// Conectando ao banco de dados
$conn = new mysqli('localhost', 'usuario', 'senha', 'sistema_saude');

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
}

// Consultando os dados dos pacientes
$sql = "SELECT nome, idade, genero, email, telefone, condicao_medica FROM pacientes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes Cadastrados - Sistema de Saúde</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Sistema de Cadastro de Saúde</h1>
    </header>

    <nav>
        <a href="index.html">Início</a>
        <a href="dados_cadastrados.php">Pacientes Cadastrados</a>
        <a href="sobre.html">Sobre o Sistema</a>
    </nav>

    <main>
        <h2>Pacientes Cadastrados</h2>
        <p>Abaixo estão listados os dados dos pacientes cadastrados no sistema:</p>

        <section class="dados-pacientes">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Género</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Condição Médica</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['idade']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['genero']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['telefone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['condicao_medica']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Nenhum paciente cadastrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <ul>
            <li>IFRN Campus Santa Cruz</li>
            <li>Sistema de Cadastro de Saúde</li>
            <li>Prof. Marcelo Figueiredo Barbosa Júnior</li>
            <li>Alunos: Mariana Ferreira e Miguel Alencar</li>
        </ul>
    </footer>
</body>
</html>

<?php
// Fechando a conexão
$conn->close();
?>
