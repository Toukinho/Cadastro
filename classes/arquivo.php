<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>classe arquivo</title>
</head>
<body>
    <?php 
        require_once 'interfaces/interArquivo.php';
        require_once 'classes/userInfo.php';

        class arquivo implements interArquivo{
            //variaveis
            private $cadastro;

            //interface
            function abrirArquivo(){
                $this->cadastro = fopen("/opt/lampp/htdocs/apredendo-php/stalo/cadastro/cadastro.txt","w");
            }
            function escrever($u){
                fwrite($this->cadastro, "Nome: " . $u->getNome() . "\n");
                fwrite($this->cadastro, "CPF: " . $u->getCpfFormatado() . "\n");
                fwrite($this->cadastro, "Telefone: " . $u->getTele() . "\n");
                fwrite($this->cadastro, "Email: " . $u->getEmail() . "\n");
            }
            function fecharArquivo(){
                fclose($this->cadastro);
            }
        }
    ?>
</body>
</html>