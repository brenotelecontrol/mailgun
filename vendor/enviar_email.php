<?php

include 'config.php';
require 'autoload.php';

use Mailgun\Mailgun;


# Instantiate the client.
$mgClient = new Mailgun(CHAVE_MAILGUN);
$domain = DOMAIN_MAILGUN;

$de = $_POST['campoDe'];
$para = $_POST['campoPara'];
$assunto = $_POST['campoAssunto'];
$texto = $_POST['campoTexto'];

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => $de,
    'to'      => $para,
    'subject' => $assunto,
    'text'    => $texto
));

echo "<div class='sucesso'>E-Mail enviado com sucesso!</div>
    <script type='text/javascript'>
        location.href = 'formulario_enviar_email.php';
    </script>";