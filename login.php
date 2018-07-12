<?php
    include 'cabecalho.php';
?>
<link rel="stylesheet" href="estilo_login.css">
<div class="container">
    <div class="row">
        <div class="col-6"></div>
        <div class="col-6">
            <form class="needs-validation" novalidate action="Mirror/User/UserAuth.php" method="post">
            <div class="form-login">
                <h4>Autenticação</h4>
                <div class="col-md-12 mb-6">
                    <input type="text" id="userName" class="form-control input-sm chat-input is-valid" placeholder="Usuário" required />
                    <div class="invalid-tooltip">
                        Login não pode ser vazio
                    </div>
                </div>
                </br>
                <div class="col-md-12 mb-6">
                    <input type="password" id="userPassword" class="form-control input-sm chat-input is-valid" placeholder="Senha" required />
                    <div class="invalid-tooltip">
                        Senha não pode ser vazio
                    </div>
                </div>
                </br>
                <div class="wrapper">
            <span class="group-btn">
                <button class="btn btn-primary btn-md" type="submit" id="btnConectar">Conectar <i class="fa fa-sign-in"></i></button>
            </span>
                </div>
            </div>
            </form>
        </div>
        <div class="col-6"></div>
    </div>
</div>
<?php
    include 'rodape.php';
?>