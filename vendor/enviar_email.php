<?php

include 'config.php';
require 'autoload.php';

use Mailgun\Mailgun;

$mgClient = new Mailgun(CHAVE_MAILGUN);
$domain = DOMAIN_MAILGUN;

$de = $_POST['campoDe'];
$para = $_POST['campoPara'];
$assunto = $_POST['campoAssunto'];
$texto = $_POST['campoTexto'];

try {
    $result = $mgClient->sendMessage($domain, array(
        'from' => $de,
        'to' => $para,
        'subject' => $assunto,
        'text' => $texto
    ));
}catch (\Exception $e){
    $errorMessage = $e->getMessage();
?>
    <div class="alert alert-danger" role="alert" align="center">
        Não foi possível enviar e-mail de teste
    </div>
<?php
}

echo "<div class='sucesso'>E-Mail enviado com sucesso!</div>
    <script type='text/javascript'>
        location.href = 'formulario_enviar_email.php';
    </script>";