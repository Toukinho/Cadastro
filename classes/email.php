<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe email</title>
</head>
<body>
    <?php 
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require 'vendor/autoload.php';
        require_once 'interfaces/InterEmail.php';
        require_once 'classes/userInfo.php';

        class email implements InterEmail{
            //variaveis 
            private $mail;

            public function __construct() {
                //informações do server
                $this->mail = new PHPMailer(true);              
                $this->mail->isSMTP();                                            
                $this->mail->Host       = 'smtp.gmail.com';                     
                $this->mail->SMTPAuth   = true;                                   
                $this->mail->Username   = 'jonhlukelima@gmail.com';                     
                $this->mail->Password   = 'segredo';                               
                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
                $this->mail->Port       = 465;
                //de onde sai
                $this->mail->setFrom('jonhlukelima@gmail.com', 'J.Lucas');
                //replay  
                $this->mail->addReplyTo('jonhlukelima@gmail.com', 'Reply');
                //Conteúdo
                $this->mail->isHTML(true);
                $this->mail->Subject = 'Cadastro';
                $this->mail->Body = 'Email de Confirmação de cadastro';
            }

            //interface
            function addArquivo($path){ //colocar o caminho do arquivo a ser enviado na variavel path
                $this->mail->addAttachment($path);
            }

            function enviarEmail($uI){
                //para onde vai
                $this->mail->addAddress($uI->getEmail(),$uI->getNome());   
            
                try {       
                    //enviando o email
                    $this->mail->send();
                    echo '<p>O email foi enviada';
                } catch (Exception $e) {
                    echo "O email não foi enviado Mailer Error: {$this->mail->ErrorInfo}";
                }
            }

        }
    ?>
</body>
</html>