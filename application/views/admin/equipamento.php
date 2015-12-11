        <h2 class="h2-equipamento">Opções</h2>
        <form class="inner-box" action="" method="post">
            <div class="padding">
                <span class="input-text">Código do equipamento</span>
                <input name="codigo" type="text" autocomplete="off" value="<?= $equipamento->codigo ?>" />
                <input id="excluir" name="excluir" type="checkbox" />
                <label for="excluir">Excluir este equipamento</label>
                <p id="assinalou_excluir"> 
                    Esta ação é irreversível.
                </p>
            </div>
            <div class="footer-box">
                <input type="submit" value="Confirmar mudanças" />
            </div>
        </form>
    </div>
</section>