        <h2 class="h2-equipamento" onclick="abrir('op');" style="cursor: pointer">
            Opções <img src="<?= url("img/abrir_op.png") ?>">
        </h2>
        <div id="op" class="h0 h0-move">
            <form class="inner-box" action="" method="post">
                <div class="padding">
                    <span class="input-text">Nome da sala</span>
                    <input name="nome" type="text" value="<?= $sala->nome ?>" autocomplete="off"/>
                    
                    <span class="input-text">Mudar de bloco</span>
                    <select name="id_bloco">
                        <option selected value='0'>Mudar de bloco...</option>
                        <?php
                        $blocos = $this->bloco_model->getAll();
                        foreach($blocos as $bloco){
                            if($bloco->idBloco != $sala->Bloco_idBloco){
                        ?>
                        <option value="<?= $bloco->idBloco ?>"><?= $bloco->nome ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    
                    <span class="input-text">Exclusão da sala</span>
                    <input id="excluir" name="excluir" type="checkbox" />
                    <label for="excluir">Excluir esta sala</label>
                    <p id="assinalou_excluir">
                        Isto também excluirá todos os equipamentos relacionados à sala. 
                        Esta ação é irreversível.
                    </p>
                </div>
                <div class="footer-box">
                    <input type="submit" value="Confirmar mudanças" />
                </div>
            </form>
        </div>

        <section class="inner-box">
            <header>
                <a href="<?= url("admin/adicionar_equipamento/$sala->idSala") ?>">+ Adicionar</a>
                <h1>Equipamentos</h1>
            </header>
            <ul class="mostrar">
                <?php
                
                $m_equipamento = new Equipamento_Model;
                $equipamentos = $m_equipamento->getAllFromSala($sala->idSala);
                
                if(!$equipamentos){
                    echo "<div class=\"result0\">Nenhum equipamento cadastrado nesta sala.</div>";
                }
                
                foreach($equipamentos as $equipamento){
                ?>
                <li>
                    <a href="<?= url("admin/equipamento/$equipamento->idEquipamento") ?>">
                        <img src="<?= url("img/computador.png") ?>" /><?= $equipamento->codigo ?>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </section>
    </div>
</section>