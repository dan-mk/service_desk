<ul class="wrap">
    <?php
    
    $blocos = $this->bloco_model->getAll();
    
    $cont = 1;
    foreach ($blocos as $bloco) {
    ?>
    <li>
        <input id="input<?= $cont ?>" class="input" type="checkbox" />
        <label
            <?php
            if($cont == 1){
                echo "id=\"first\"";
            }
            ?>
            for="input<?= $cont ?>" class="item" onclick="abrir('box<?= $cont ?>');">
            <?= $bloco->nome ?>
        </label>
        <ul id="box<?= $cont ?>" class="mostrar h0">
            <?php
            
            $salas = $this->sala_model->getAllFromBloco($bloco->idBloco);
            
            foreach ($salas as $sala) {
            ?>
            <li>
                <a href="<?= url("sala/$sala->idSala") ?>">
                    <img src="img/porta.png" /><?= $sala->nome ?>
                </a>
            </li>
            <?php
            }
            ?>
            
        </ul>
    </li>
    <?php
        $cont++;
    }
    ?>
    
</ul>