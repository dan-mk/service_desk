<section class="wrap">
    <header class="header-sala">
        <a href="<?= url("admin") ?>"><h1>Área do administrador</h1></a>
        <a class="link-cabecalho" href="<?= url("conta") ?>">Minha conta</a>
        <a class="link-cabecalho" href="<?= url("tecnico") ?>">Área do técnico</a>
    </header>
    <div class="sub-header">
        <div>
            <span>Bloco:</span>
            <h2>Adicionar bloco</h2>
        </div>
    </div>
    <div style="background: #efefef; padding: 16px 22px">
        <form action="" method="post" class="inner-box">
            <div class="padding">
                <span class="input-text">Nome do bloco</span>
                <input name="nome" type="text" />
                <span class="input-text">Prioridade</span>
                <input name="prioridade" type="text" />
            </div>
            <div class="footer-box">
                <input type="submit" value="Adicionar" />
            </div>
        </form>
    </div>
</section>

