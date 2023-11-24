<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>
    <main>
        <h1>Cadastre-se</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="name">Nome:</label>
            <input type="text" name="nome" id="nome">
            
            <label for="cpf">CPF:</label>
            <input type="number" name="cpf" id="cpf">

            <label for="tele">Telefone:</label>
            <input type="number" name="tele" id="tele">

            <label for="mail">Email:</label>
            <input type="email" name="mail" id="mail">

            <input type="submit" value="Enviar">
        </form>
        <section>
            <h2>Status do cadastro</h2>
            <?php 
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $tele = $_POST['tele'];
                $mail = $_POST['mail'];
    
                if(empty($nome) || empty($cpf) || empty($tele) || empty($mail)){
                    echo "Seus dados não foram enviados. Faltam informações.";
                }else{
                    echo "Seus dados foram enviados!";

                    $cadastro = fopen("Cadastro.txt","a");
                    fwrite($cadastro, "Nome: $nome \n");
                    fwrite($cadastro, "CPF: $cpf \n");
                    fwrite($cadastro, "Telefone: $tele \n");
                    fwrite($cadastro, "Email: $mail \n");
                    fclose($cadastro);
                }
            ?>
        </section>
    </main>
</body>
</html>