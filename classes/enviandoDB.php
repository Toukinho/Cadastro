<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe do DB</title>
</head>
<body>
    <?php 
        require_once 'classes/userInfo.php';
        require_once 'interfaces/interDB.php';
        class enviandoDB implements interDB{
            //variaveis
            private $conn;

            //interface
            function enviarDB($u){
                //ligando com my sql
                $this->conn = new mysqli('localhost', 'root', '', "cadastro");
                // Verifica a conexão
                if ($this->conn->connect_error) {
                    echo "Conexão falhou: " . $this->conn->connect_error;
                }

                $sql = "INSERT INTO pessoa (nome, cpf, telefone, email) VALUES (" . $u->getNome() . ", " . $u->getCpfFormatado() . ", " . $u->getTele() . ", " . $u->getEmail() . ")";
                // Executa o codigo my sql acima
                if ($this->conn->query($sql) === TRUE) {
                    echo ("Cadastro feito com sucesso.");
                } else {
                    echo "Erro ao inserir os dados do cadastro: " . $this->conn->error;
                }

                // Fecha a conexão
                $this->conn->close();
            }
        }
    ?>
</body>
</html>