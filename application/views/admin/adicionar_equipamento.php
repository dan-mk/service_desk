        <form action="" method="post" class="inner-box">
            <div class="padding">
                <span class="input-text">Código do equipamento</span>
                <input name="codigo" type="text" />
                <span class="input-text">Tipo</span><br>
                <?php
                
                $m_tipo = new Tipo_Model;
                $tipos = $m_tipo->getAll();
                
                foreach ($tipos as $tipo){
                ?>
                    <input id="<?= $tipo->idTipo ?>" name="tipo" type="radio" />
                    <label for="<?= $tipo->idTipo ?>"><?= $tipo->nome ?></label>
                <?php
                }
                ?>
                <span class="input-text">Novo tipo (nenhuma das alternativas acima)</span>
                <input name="tipo_novo" type="text" />
            </div>
            <div class="footer-box">
                <input type="submit" value="Adicionar" />
            </div>
        </form>
    </div>
</section>

