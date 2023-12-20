<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface de arquivo.php</title>
</head>
<body>
    <?php 
        interface interArquivo{
            function abrirArquivo();
            function escrever($u);
            function fecharArquivo();
        }
    ?>
</body>
</html>