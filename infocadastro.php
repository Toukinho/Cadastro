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
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            require 'vendor/autoload.php';

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //info do form
                $nome = $_POST['nome'];
                $cpf = $_POST['cpf'];
                $tele = $_POST['tele'];
                $email = $_POST['mail'];

                function formatarCPF($cpf) {
                    // Remover caracteres não numéricos
                    $cpf = preg_replace('/[^0-9]/', '', $cpf);
                
                    // Adicionar a formatação
                    $cpfFormatado = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
                
                    return $cpfFormatado;
                }
                
                $cpfFormatado = formatarCPF($cpf);

                //cria e escreve o arquivo.txt
                $cadastro = fopen("Cadastro.txt","w");
                fwrite($cadastro, "Nome: $nome \n");
                fwrite($cadastro, "CPF: $cpfFormatado \n");
                fwrite($cadastro, "Telefone: $tele \n");
                fwrite($cadastro, "Email: $email \n");
                fclose($cadastro);
                
                //enviando o email
                try {       
                    //informações do server
                    $mail = new PHPMailer(true);              
                    $mail->isSMTP();                                            
                    $mail->Host       = 'smtp.gmail.com';                     
                    $mail->SMTPAuth   = true;                                   
                    $mail->Username   = 'jonhlukelima@gmail.com';                     
                    $mail->Password   = 'segredo';                               
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                    $mail->Port       = 465;

                    //de onde sai
                    $mail->setFrom('jonhlukelima@gmail.com', 'João');
                    //para onde vai
                    $mail->addAddress($email, $nome);   
                    //replay  
                    $mail->addReplyTo('jonhlukelima@gmail.com', 'Informacao Teste');

                    //Manda o arquivo junto do email
                    $mail->addAttachment('/opt/lampp/htdocs/apredendo-php/stalo/cadastro/Cadastro.txt');

                    //Conteúdo
                    $mail->isHTML(true);
                    $mail->Subject = 'Cadastro';
                    $mail->Body    = 'Teste';
                    
                    //email enviado!!!
                    $mail->send();
                    echo 'A mensagem foi enviada';
                } catch (Exception $e) {
                    echo "O email não foi enviado Mailer Error: {$mail->ErrorInfo}";
                }
                
            }

?>
    </main>
</body>
</html>