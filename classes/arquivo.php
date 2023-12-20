<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>classe arquivo</title>
</head>
<body>
    <?php 
        require_once '/interfaces/interArquivo.php';
        class arquivo implements interArquivo{
            function criarArquivo(){}
            function escrever(){}
        }
    ?>
</body>
</html>