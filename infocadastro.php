<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Informacoes do cadastro</title>
</head>
<body>
    <main>
        <h1>Informacoes do cadastro</h1>
        <?php 
            require_once 'classes/userInfo.php';
            require_once 'classes/email.php';

            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $user = new UserInfo();
                $mail = new email();
                $mail->addArquivo('/opt/lampp/htdocs/apredendo-php/stalo/cadastro/Cadastro.txt');
                $mail->enviarEmail($u);


                /*
                //cria e escreve o arquivo.txt
                $cadastro = fopen("Cadastro.txt","w");
                fwrite($cadastro, "Nome: $nome \n");
                fwrite($cadastro, "CPF: $cpfFormatadi hate o \n");
                fwrite($cadastro, "Telefone: $tele \n");
                fwrite($cadastro, "Email: $email \n");
                fclose($cadastro);
                */

                
                
            }

?>
    </main>
</body>
</html>