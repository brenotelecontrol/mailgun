<?php
    include 'menu.php';
?>
<br>
<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-lg-6">
            <h2>Consultar envios de e-mails com Mailgun</h2>
        </div>
        <div class="col"></div>
    </div><br>
    <div class="row">
        <div class="col"></div>
        <div class="col-6">
            <form class="needs-validation" novalidate action="listar_estatisticas.php" method="post">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Digite o Valor</label>
                        <input type="text" class="form-control is-valid" id="campoValor" name="campoValor" placeholder="" pattern="^[0-9]+$" required>
                        <div class="invalid-tooltip">
                            Por favor preencher o campo.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Parâmetro</label>
                        <select class="form-control" id="campoParametro" name="campoParametro" required>
                            <option value="h">hora</option>
                            <option value="d">dia</option>
                            <option value="m">mês</option>
                        </select>
                        <div class="invalid-tooltip">
                            Por favor selecionar o parâmetro.
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Consultar</button>&nbsp;
                <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Legenda
                </button>
                <div class="collapse" id="collapseExample"><br>
                    <div class="card card-body">
                        O campo "Valor" deve ser numérico<br><br>
                        hora = busca estatísticas por hora <br>
                        dia = busca estatísticas por dia<br>
                        mês = busca estatísticas por mês<br>
                    </div>
                </div>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
<script>
    document.getElementById("campoValor").onkeypress = function(e) {
        var chr = String.fromCharCode(e.which);
        if ("1234567890".indexOf(chr) < 0)
            return false;
    };
</script>
<?php
    include 'rodape.php';
?>
