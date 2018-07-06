<?php
include 'config.php';
require 'autoload.php';
use Mailgun\Mailgun;

$mgClient = new Mailgun(CHAVE_MAILGUN);
$domain = DOMAIN_MAILGUN;
$email = $_POST['email'];

$result = $mgClient->delete("$domain/bounces/$email");

echo "<div class='sucesso'>E-Mail desbloqueado com sucesso!</div>
    <script type='text/javascript'>
        location.href = 'formulario_listar_bounces.php';
    </script>";