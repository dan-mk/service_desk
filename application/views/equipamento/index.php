<section class="wrap equipamento">
    <?php
    
    $equipamento = $this->equipamento_model->getEquipamentoById($id_equipamento);
    
    ?>
    <h1 class="header-equipamento">
        <img src="<?= url("img/computador.png"); ?>" /><?= $equipamento[0]->codigo ?>
    </h1>
    <div>
        <h2 class="h2-equipamento">Notificações pendentes</h2>
        <ul>
            <li class="borda-equipamento">
                <div>
                    <span>15:40 - 23/06/2015</span>
                    <h3 class="anonimo">Anônimo</h3>
                    <p>
                        O mouse funciona muito mal.
                    </p>
                </div>
            </li>
        </ul>
        <h2 class="h2-equipamento">Nova notificação</h2>
        <form class="borda-equipamento" action="inserir.php" method="post">
            <div>
                <input name="descricao" class="descricao" placeholder="Descrição do problema" type="text" />
                <input name="nome" class="nome" placeholder="Nome (opcional)" type="text" />
                <input class="enviar" placeholder="Enviar" type="submit" />
            </div>
        </form>
        <h2 class="h2-equipamento">Histórico</h2>
        <ul>
            <li class="borda-equipamento">
                <div>
                    <span>15:40 - 23/06/2015</span>
                    <h3>Professor 1</h3>
                    <p>
                        Teclado com várias teclas falhando.
                    </p>
                </div>
                <div class="tecnico">
                    <span>15:40 - 23/06/2015</span>
                    <h3 class="tecnico">Técnico 1</h3>
                    <p>
                        Teclado substituído.
                    </p>
                </div>
            </li>
        </ul>
    </div>
</section>