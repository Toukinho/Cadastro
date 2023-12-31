<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe UserInfo</title>
</head>
<body>
    <?php 
        require_once 'interfaces/InterUserInfo.php';
        class UserInfo implements InterUserInfo{
            //infos do cadastro
            private $nome;
            private $cpf;
            private $tele;
            private $email;
            private $cpfFormatado;

            public function __construct() {
                $this->infoDoUser();
                $this->formatarCPF($this->cpf);
            }

            //interface
            function infoDoUser(){
                $this->nome = $_POST['nome'];
                $this->cpf = $_POST['cpf'];
                $this->tele = $_POST['tele'];
                $this->email = $_POST['mail'];
            }

            private function formatarCPF($cpf) {
                // Remover caracteres não numéricos
                $this->cpf = preg_replace('/[^0-9]/', '', $cpf);
                // Adicionar a formatação
                $this->cpfFormatado = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
            }

            //getters e setters das variaveis
            public function getNome(){
                return $this->nome;
            }
            private function setNome($n){
                $this->nome = $n;
            }

            public function getCpf(){
                return $this->cpf;
            }
            private function setCpf($c){
                $this->cpf = $c;
            }

            public function getTele(){
                return $this->tele;
            }
            private function setTele($t){
                $this->tele = $t;
            }

            public function getEmail(){
                return $this->email;
            }

            private function setEmail($e){
                $this->email = $e;
            }

            public function getCpfFormatado(){
                return $this->cpfFormatado;
            }

            private function setCpfFormatado($cP){
                $this->cpfFormatado = $cP;
            }
        }
            
    ?>
</body>
</html>