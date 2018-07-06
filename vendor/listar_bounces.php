<?php
include 'menu.php';
include 'config.php';
require 'autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun(CHAVE_MAILGUN);
$domain = DOMAIN_MAILGUN;
$email = $_POST['campoEmail'];

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
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $linha=0;
                    if (empty($result)) {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Nenhum registro encontrado
                        </div>
                        <?php
                    } else {
                    foreach ($result->http_response_body as $item) {
                ?>
                <tr>
                    <td><?=$item->created_at;?></td>
                    <td align="center" id="email"><?=$item->address?></td>
                    <td align="center">
                        <form action="desbloquear_bounces.php" method="post">
                            <button class="btn btn-outline-danger btn-sm" type="submit">Desbloquear</button>
                        </form>
                    </td>
                </tr>
                <?php
                } }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col"></div>
    </div>
</div>

<?php
include 'rodape.php';
?>
