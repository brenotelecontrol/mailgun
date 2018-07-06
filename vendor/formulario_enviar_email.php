<?php
    include 'menu.php';
?>
    <br>
    <div class="container">
            <div class="row">
                <div class="col"></div>
                <div class="col-lg-6">
                    <h2>Testar envio de e-mail com Mailgun</h2>
                </div>
                <div class="col"></div>
            </div><br>
            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    <form class="needs-validation" novalidate action="enviar_email.php" method="post">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationTooltip01">From (De):</label>
                                <input type="text" class="form-control is-valid" id="campoDe" name="campoDe" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Por favor preencher o campo "De".
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationTooltip01">To (Para):</label>
                                <input type="text" class="form-control is-valid" id="campoPara" name="campoPara" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Por favor preencher o campo "Para".
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationTooltip01">Assunto</label>
                                <input type="text" class="form-control is-valid" id="campoAssunto" name="campoAssunto" placeholder="" required>
                                <div class="invalid-tooltip">
                                    Por favor preencher o campo "Assunto".
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationTooltip01">Texto</label>
                                <!-- <input type="text" class="form-control is-valid" id="campoTexto" placeholder="" value="" required> -->
                                <textarea class="form-control" id="campoTexto" name="campoTexto" rows="10" required></textarea>
                                <div class="invalid-tooltip">
                                    Por favor preencher o campo "Texto".
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
<?php
    include 'rodape.php';
?>