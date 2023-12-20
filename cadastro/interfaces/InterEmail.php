<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>interface email.php</title>
</head>
<body>
    <?php 
        interface InterEmail{
            function enviarEmail($uI);
            function addArquivo($path);
        }
    ?>
</body>
</html>