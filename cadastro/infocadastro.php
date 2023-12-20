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
            require_once 'classes/arquivo.php';
            require_once 'classes/sendDB.php';
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $user = new UserInfo();
                
                /* Enviando para o db 
                $db = new sendDB();
                $db->enviarDB($user);
                */

                /* Email com arquivo
                $mail = new email();
                $mail->enviarEmail($user);
                $mail->addArquivo(stalo/cadastro/cadastro.txt);
                */
                
                /* Testando o metodo criar arquivo
                $arc = new arquivo();
                $arc->abrirArquivo();
                $arc->escrever($user);
                function fecharArquivo();
                */
            }

?>
    </main>
</body>
</html>