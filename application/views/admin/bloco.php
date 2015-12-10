        <h2 class="h2-equipamento">Opções</h2>
        <form class="inner-box" action="" method="post">
            <div class="padding">
                <span class="input-text">Nome do bloco</span>
                <input name="nome" type="text" />
                <span class="input-text">Prioridade</span>
                <input name="prioridade" type="text" />
                <input id="excluir" name="excluir" type="checkbox" />
                <label for="excluir">Excluir este bloco</label><br>
            </div>
            <div class="footer-box">
                <input type="submit" value="Confirmar mudanças" />
            </div>
        </form>

        <section class="inner-box">
            <header>
                <a href="<?= url("admin/adicionar_sala/$id_bloco") ?>">+ Adicionar</a>
                <h1>Salas</h1>
            </header>
            <ul class="mostrar">
                <?php
                
                $m_sala = new Sala_Model;
                $salas = $m_sala->getAllFromBloco($id_bloco);
                
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