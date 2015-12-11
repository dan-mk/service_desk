<section class="wrap">
    <header class="header-sala">
        <a href="<?= url("admin") ?>"><h1>Área do administrador</h1></a>
        <a class="link-cabecalho" href="<?= url("conta") ?>">Minha conta</a>
        <a class="link-cabecalho" href="<?= url("tecnico") ?>">Área do técnico</a>
    </header>
    <div style="background: #efefef; padding: 14px">
        <section class="inner-box">
            <header>
                <a href="<?= url("admin/adicionar_tecnico") ?>">+ Adicionar</a>
                <h1>Técnicos TI</h1>
            </header>
            <ul class="mostrar mostrar2">
                <?php
                
                $m_tecnico = new Tecnico_Model;
                $tecnicos = $m_tecnico->getAll();
                
                foreach($tecnicos as $tecnico){
                ?>
                <li><a href="#"><img src="<?= url("img/tecnico_lista.png") ?>" /><?= $tecnico->nome ?></a></li>
                <?php
                }
                ?>
            </ul>
        </section>
        <section class="inner-box">
            <header>
                <a href="<?= url("admin/adicionar_bloco") ?>">+ Adicionar</a>
                <h1>Blocos</h1>
            </header>
            <ul class="mostrar mostrar2">
                <?php
                
                $m_bloco = new Bloco_Model;
                $blocos = $m_bloco->getAll();
                
                foreach($blocos as $bloco){
                ?>
                <li>
                    <a href="<?= url("admin/bloco/$bloco->idBloco") ?>">
                        <img src="<?= url("img/bloco_lista.png") ?>" /><?= $bloco->nome ?>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </section>
    </div>
</section>
