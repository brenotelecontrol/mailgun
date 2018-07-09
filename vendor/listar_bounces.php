<?php
include 'menu.php';
include 'config.php';
require 'autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun(CHAVE_MAILGUN);
$domain = DOMAIN_MAILGUN;
$email = $_POST['campoEmail'];

try{
    $result = $mgClient->get("$domain/bounces/$email");
?><br>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-lg-10">
            <h2>E-Mails Devolvidos</h2>
        </div>
        <div class="col"></div>
    </div><br>
    <div class="row">
        <div class="col"></div>
        <div class="col-lg-10">
            <table class="table table-striped ">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Entrada</th>
                    <th scope="col">Cód. Erro</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($result->http_response_body as $item) {
                ?>
                <tr>
                    <td><?=$item->created_at;?></td>
                    <td align="center" id="email" name="email"><?=$item->address?></td>
                    <td align="center" id="codigoerr" name="codigoerr"><?=$item->code?></td>
                    <td align="center">
                        <form action="desbloquear_bounces.php" method="post">
                            <input type="hidden" value="<?=$item->address?>" id="xemail" name="xemail">
                            <button class="btn btn-outline-danger btn-sm" type="submit">Desbloquear</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td scope="col" align="center" colspan="4" bgcolor="#b22222"><span style="color: white"><b>Mensagem de Erro</b></span></td>
                </tr>
                <tr>
                    <td align="center" id="mensagemerr" colspan="4"><?=$item->error?></td>
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
