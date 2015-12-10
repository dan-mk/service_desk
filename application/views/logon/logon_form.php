<section class="wrap">

    <form class="conectar_form" action="<?= url("logon/logar"); ?>" method="post">
        <div class="padding">
            <span class="input-text">Usuário</span>
            <input name="usuario" type="text" />
            <span class="input-text">Senha</span>
            <input name="senha" type="password" />
        </div>
        <div class="footer-box">
            <input type="submit" value="Conectar" />
        </div>
    </form>

</section>

