<section class="wrap">
    <header class="header-sala">
        <?php
        $sala = $this->sala_model->getSalaById($id_sala);
        ?>
        <img src="<?= url("img/porta.png") ?>" />
        <h1><?= $sala[0]->nome ?></h1>
        <form action="" method="get">
            <input class="botao-pesquisa" value="" type="submit" />
            <input class="pesquisa" name="pesquisa" placeholder="Não funciona" type="text" />
        </form>
    </header>
    <ul id="box1" class="mostrar computador-sala">
        <?php
        $equipamentos = $this->equipamento_model->getAllFromSala($id_sala);
        
        foreach ($equipamentos as $equipamento) {
        ?>    
            <li>
                <a href="<?= url("equipamento/$equipamento->idEquipamento"); ?>">
                    <img src="<?= url("img/computador.png"); ?>" /><?= $equipamento->codigo ?>
                </a>
            </li>
        <?php
        }
        ?>
        
    </ul>
</section>