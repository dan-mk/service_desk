        <h2 class="h2-equipamento" onclick="abrir('op');" style="cursor: pointer">
            Opções <img src="<?= url("img/abrir_op.png") ?>">
        </h2>
        <div id="op" class="h0 h0-move">
            <form class="inner-box" action="" method="post">
                <div class="padding">
                    <span class="input-text">Nome do bloco</span>
                    <input name="nome" type="text" value="<?= $bloco->nome ?>" autocomplete="off" />
                    <span class="input-text">Prioridade</span>
                    <input name="prioridade" type="text" value="<?= $bloco->prioridade ?>" autocomplete="off" />
                    <span class="input-text">Exclusão do bloco</span>
                    <input id="excluir" name="excluir" type="checkbox" />
                    <label for="excluir">Excluir este bloco</label>
                    <p id="assinalou_excluir">
                        Isto também excluirá todas as salas e equipamentos relacionados ao bloco. 
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
                <a href="<?= url("admin/adicionar_sala/$bloco->idBloco") ?>">+ Adicionar</a>
                <h1>Salas</h1>
            </header>
            <ul class="mostrar">
                <?php
                
                $m_sala = new Sala_Model;
                $salas = $m_sala->getAllFromBloco($bloco->idBloco);
                
                if(!$salas){
                    echo "<div class=\"result0\">Nenhuma sala cadastrada neste bloco.</div>";
                }
                
                foreach($salas as $sala){
                ?>
                <li>
                    <a href="<?= url("admin/sala/$sala->idSala") ?>">
                        <img src="<?= url("img/porta.png") ?>" /><?= $sala->nome ?>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </section>
    </div>
</section>