<section class="wrap equipamento">
    <?php
    
    $equipamento = $this->equipamento_model->getEquipamentoById($id_equipamento);
    
    ?>
    <h1 class="header-equipamento">
        <img src="<?= url("img/computador.png"); ?>" /><?= $equipamento[0]->codigo ?>
    </h1>
    <div>
        <?php
        $problemas = $this->problema_model->getActiveFromEquipamento($id_equipamento);
        if($problemas){
        ?>
        <h2 class="h2-equipamento">Notificações pendentes</h2>
        <ul>
            <?php
            foreach($problemas as $problema){
            ?>
            <li class="borda-equipamento inner-box">
                <div>
                    <span>
                        <?php
                        $data_tempo = new DateTime($problema->data_problema, new DateTimeZone("America/Sao_Paulo"));
                        echo $data_tempo->format("h:i - d/m/Y")
                        ?>
                    </span>
                    <h3 class="anonimo"><?= $problema->nome ?></h3>
                    <p>
                        <?= $problema->descricao ?>
                    </p>
                </div>
                <?php
                if($logged){
                ?>
                <form action="<?= url("tecnico/resolver/$problema->idProblema")?>" method="post">
                    <div style="border-top: 1px solid #d9d9d9; padding: 10px 15px">
                        <span class="input-text" style="float: none">Descrição do procedimento</span>
                        <input name="descricao" type="text" autocomplete="off" />
                    </div>
                    <div class="footer-box" style="padding: 0">
                        <a style="float: left; display: block; margin: 11px 0 0 14px; font-size: 13px" 
                           href="<?= url("tecnico/excluir_problema/$problema->idProblema") ?>">
                            Excluir problema
                        </a>
                        <input type="submit" value="Resolver" />
                    </div>
                </form>
                <?php
                }
                ?>
            </li>
            <?php
            }
            ?>
        </ul>
        <?php
        }
        ?>
        <h2 class="h2-equipamento">Nova notificação de problema</h2>
        <form class="inner-box" action="" method="post">
            <div class="padding">
                <span class="input-text">Descrição do problema</span>
                <input name="descricao" type="text" autocomplete="off" />
                <span class="input-text">Nome (opcional)</span>
                <input name="nome" type="text" autocomplete="off" />
            </div>
            <div class="footer-box">
                <input value="Notificar" type="submit" />
            </div>
        </form>
        <?php
        $resolvidos = $this->problema_model->getHistoricoFromEquipamento($id_equipamento);
        if($resolvidos){
        ?>
        <h2 class="h2-equipamento">Histórico</h2>
        <ul>
            <?php
            foreach($resolvidos as $resolvido){
            ?>
            <li class="borda-equipamento">
                <div>
                    <span>
                        <?php
                        $data_tempo = new DateTime($resolvido->data_problema, new DateTimeZone("UTC"));
                        echo $data_tempo->format("h:i - d/m/Y");
                        ?>
                    </span>
                    <h3><?= $resolvido->nome ?></h3>
                    <p>
                        <?= $resolvido->descricao ?>
                    </p>
                </div>
                <div class="tecnico">
                    <?php
                    
                    $resolucao = $this->resolucao_model->getResolucaoFromProblema($resolvido->idProblema);
                    $tecnico = $this->tecnico_model->getTecnicoById($resolucao[0]->Tecnico_idTecnico);
                    
                    ?>
                    <span>
                        <?php
                        $data_tempo = new DateTime($resolucao[0]->data_resolucao, new DateTimeZone("UTC"));
                        echo $data_tempo->format("h:i - d/m/Y");
                        ?>
                    </span>
                    <h3 class="tecnico"><?= $tecnico[0]->nome ?></h3>
                    <p>
                        <?= $resolucao[0]->descricao ?>
                    </p>
                </div>
            </li>
            <?php
            }
            ?>
        </ul>
        <?php
        }
        ?>
    </div>
</section>