<?php
include 'menu.php';
include 'config.php';
require 'vendor/autoload.php';
use Mailgun\Mailgun;

$mgClient = new Mailgun(CHAVE_MAILGUN);
$domain = DOMAIN_MAILGUN;
$email = 'log@telecontrol.com.br';
<<<<<<< HEAD
//$consulta = array([message] => [headers] => [to] => $email);
=======
$consulta = array('message,headers,to' => $email);
>>>>>>> f778aef42e258a04c1ba101d022699f4ee14b41b

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
<<<<<<< HEAD
                <nav aria-label="Pagina de navegacao">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="<?=$result->http_response_body->items->paging->first?>">Primeira</a></li>
                        <li class="page-item"><a class="page-link" href="<?=$result->http_response_body->items->paging->previous?>">Anterior</a></li>
                        <li class="page-item"><a class="page-link" href="<?=$result->http_response_body->items->paging->next?>">Próxima</a></li>
                        <li class="page-item"><a class="page-link" href="<?=$result->http_response_body->items->paging->last?>">Última</a></li>
                    </ul>
                </nav>
=======
>>>>>>> f778aef42e258a04c1ba101d022699f4ee14b41b
                <table class="table table-striped ">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Para</th>
                            <th scope="col">De</th>
<<<<<<< HEAD
                            <th scope="col">Data</th>
                            <th scope="col">Código</th>
=======
>>>>>>> f778aef42e258a04c1ba101d022699f4ee14b41b
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($result->http_response_body->items as $item) {
<<<<<<< HEAD
                            //$time = strtotime($item->created_at);
                            $dateInLocal = date("d-m-Y H:i:s", $item->timestamp);
=======
>>>>>>> f778aef42e258a04c1ba101d022699f4ee14b41b
                    ?>
                        <tr>
                            <td align="center" id="emailDe" name="emailDe"><?=$item->message->headers->from?></td>
                            <td align="center" id="emailPara" name="emailPara"><?=$item->message->headers->to?></td>
<<<<<<< HEAD
                            <td align="center" id="emailData" name="emailData"><?=$dateInLocal?></td>
                            <td align="center" id="emailCode" name="emailCode"><?=$item->{"delivery-status"}->code?></td>
                        </tr>
                        <tr>
                            <td scope="col" align="center" colspan="4" bgcolor="#a9a9a9"><span style="color: white"><b>Mensagem de Retorno</b></span></td>
                        </tr>
                        <tr>
                            <td align="center" id="mensagemerr" colspan="4"><?=$item->{"delivery-status"}->message?></td>
                        </tr>
                        <tr>
                            <td scope="col" align="center" colspan="4" bgcolor="black"></td>
=======
>>>>>>> f778aef42e258a04c1ba101d022699f4ee14b41b
                        </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
<<<<<<< HEAD
                <nav aria-label="Pagina de navegacao">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="<?=$result->http_response_body->items->paging->first?>">Primeira</a></li>
                        <li class="page-item"><a class="page-link" href="<?=$result->http_response_body->items->paging->previous?>">Anterior</a></li>
                        <li class="page-item"><a class="page-link" href="<?=$result->http_response_body->items->paging->next?>">Próxima</a></li>
                        <li class="page-item"><a class="page-link" href="<?=$result->http_response_body->items->paging->last?>">Última</a></li>
                    </ul>
                </nav>
=======
>>>>>>> f778aef42e258a04c1ba101d022699f4ee14b41b
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
<<<<<<< HEAD
?>

=======
?>
>>>>>>> f778aef42e258a04c1ba101d022699f4ee14b41b
