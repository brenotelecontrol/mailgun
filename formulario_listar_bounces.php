<?php
include 'menu.php';
?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-lg-6">
                <h2>Consultar e-mails Devolvidos</h2>
            </div>
            <div class="col"></div>
        </div><br>
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <form class="needs-validation" novalidate action="listar_bounces.php" method="post">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationTooltip01">Digite o E-mail</label>
                            <input type="text" class="form-control is-valid" id="campoEmail" name="campoEmail" placeholder="" required>
                            <div class="invalid-tooltip">
                                Por favor preencher o campo.
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Consultar</button>&nbsp;
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
<?php
include 'rodape.php';
?>