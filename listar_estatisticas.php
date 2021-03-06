<?php
include 'menu.php';
include 'config.php';
require 'vendor/autoload.php';

use Mailgun\Mailgun;

$mgClient = new Mailgun(CHAVE_MAILGUN);
$domain = DOMAIN_MAILGUN;

//$userMirror = new Mirror\User\User();

$valor = $_POST['campoValor'];
$parametro = $_POST['campoParametro'];
$duracao = $valor . $parametro;

try{
    //$espelho = $userMirror->get("123");

    $result = $mgClient->get("$domain/stats/total", array(
    'event' => array('accepted', 'delivered', 'failed'),
    'duration' => $duracao
));
?><br>
    <input type="hidden" id="duracao" valor="<?=$duracao?>">
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-lg-10">
            <h2>Recebimento e Envio de E-Mails</h2>
        </div>
        <div class="col"></div>
    </div><br>
    <div class="row">
        <div class="col"></div>
        <div class="col-lg-10">
            <div class="alert alert-warning" role="alert">
                Parâmetro:&nbsp;<?=$result->http_response_body->resolution?>
            </div><br>
            <table class="table table-striped ">
                <thead class="thead-light">
                    <td>&nbsp;</td>
                    <td colspan="3" class="table-success" align="center">Enviados com sucesso</td>
                    <td colspan="3" class="table-warning" align="center">Protocolos de Entrega</td>
                    <td class="table-danger" align="center">Erros de Entrega</td>
                </thead>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Entrada</th>
                        <th scope="col">Saída</th>
                        <th scope="col">TOTAL</th>
                        <th scope="col">Smtp</th>
                        <th scope="col">Http</th>
                        <th scope="col">TOTAL</th>
                        <th scope="col">Devolvidos</th>
                    </tr>
                </thead>
                <tbody>
<?php
$linha=0;
foreach ($result->http_response_body->stats as $item) {
    $time = strtotime($item->time);
    if ($parametro == 'h') {
        $dateInLocal = date("d-m-Y H:i:s", $time);
    } else {
        $dateInLocal = date("d-m-Y", $time);
    }
?>
    <tr>

        <td><?=$dateInLocal;?></td>
        <td align="center"><?=$item->accepted->incoming?></td>
        <td align="center"><?=$item->accepted->outgoing?></td>
        <td align="center"><?=$item->accepted->total?></td>
        <td align="center"><?=$item->delivered->smtp?></td>
        <td align="center"><?=$item->delivered->http?></td>
        <td align="center"><?=$item->delivered->total?></td>
        <td align="center"><?=$item->failed->permanent->bounce?></td>
    </tr>
    <?php
}
?>
                </tbody>
            </table><br><br>
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
        Parâmetros não encontrados
    </div>
    <?php
    include 'rodape.php';
}
?>