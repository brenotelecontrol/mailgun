<?php
include 'menu.php';
include 'config.php';
require 'vendor/autoload.php';
use Mailgun\Mailgun;

$mgClient = new Mailgun(CHAVE_MAILGUN);
$domain = DOMAIN_MAILGUN;
$email = 'log@telecontrol.com.br';
$consulta = array('message,headers,to' => $email);

try{
    //$result = $mgClient->get("$domain/events", $consulta);
    $result = $mgClient->get("$domain/events");
    //print_r($result);
?><br>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-lg-10">
                <h2>Log de e-mails enviados</h2>
            </div>
            <div class="col"></div>
        </div><br>
        <div class="row">
            <div class="col"></div>
            <div class="col-lg-10">
                <table class="table table-striped ">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Para</th>
                            <th scope="col">De</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($result->http_response_body->items as $item) {
                    ?>
                        <tr>
                            <td align="center" id="emailDe" name="emailDe"><?=$item->message->headers->from?></td>
                            <td align="center" id="emailPara" name="emailPara"><?=$item->message->headers->to?></td>
                        </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
<?php
    include 'rodape.php';
}catch (\Exception $e){
    $errorMessage = $e->getMessage();
    ?>
    <div class="alert alert-danger" role="alert" align="center">
        Endereço de e-mail <b><?=$email?></b> não encontrado
    </div>
    <?php
    include 'rodape.php';
}
?>