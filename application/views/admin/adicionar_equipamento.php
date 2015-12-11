        <form action="" method="post" class="inner-box">
            <div class="padding">
                <span class="input-text">Código do equipamento</span>
                <input name="codigo" type="text" autocomplete="off" />
                <span class="input-text">Tipo</span><br>
                <div>
                <?php
                
                $m_tipo = new Tipo_Model;
                $tipos = $m_tipo->getAll();
                
                foreach ($tipos as $tipo){
                ?>
                    <input id="<?= $tipo->idTipo ?>" name="id_tipo" value="<?= $tipo->idTipo ?>" type="radio" />
                    <label for="<?= $tipo->idTipo ?>"><?= $tipo->nome ?></label>
                <?php
                }
                ?>
                </div>
                <div>
                    <input id="novo" name="id_tipo" value="0" type="radio" />
                    <label for="novo">Novo tipo (nenhuma das alternativas acima)</label>
                </div>
                <input name="tipo_novo" type="text" autocomplete="off" />
            </div>
            <div class="footer-box">
                <input type="submit" value="Adicionar" />
            </div>
        </form>
    </div>
</section>

