        <h2 class="h2-equipamento">Opções</h2>
        <form class="inner-box" action="" method="post">
            <div class="padding">
                <span class="input-text">Nome da sala</span>
                <input name="nome" type="text" />
                <input id="excluir" name="excluir" type="checkbox" />
                <label for="excluir">Excluir esta sala</label><br>
            </div>
            <div class="footer-box">
                <input type="submit" value="Confirmar mudanças" />
            </div>
        </form>

        <section class="inner-box">
            <header>
                <a href="<?= url("admin/adicionar_equipamento/$id_sala") ?>">+ Adicionar</a>
                <h1>Equipamentos</h1>
            </header>
            <ul class="mostrar">
                <?php
                
                $m_equipamento = new Equipamento_Model;
                $equipamento = $m_equipamento->getAllFromSala($id_sala);
                
                foreach($equipamento as $equipamento){
                ?>
                <li>
                    <a href="<?= url("admin/equipamento/$equipamento->idEquipamento") ?>">
                        <img src="<?= url("img/computador.png") ?>" /><?= $equipamento->nome ?>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </section>
    </div>
</section>