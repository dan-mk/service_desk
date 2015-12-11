<section class="wrap">
    <header class="header-sala">
        <a href="<?= url("tecnico") ?>"><h1>Área do técnico</h1></a>
        <a class="link-cabecalho" href="<?= url("conta") ?>">Minha conta</a>
		<?php
		if($admin){
		?>
        <a class="link-cabecalho" href="<?= url("admin") ?>">Área do admin</a>
		<?php
		}
		?>
    </header>
    <div style="background: #efefef; padding: 14px">
        <section class="inner-box">
            <header>
                <h1>Últimas notificações de problemas</h1>
            </header>
            <ul class="mostrar mostrar2">
                <?php
                
                $m_tecnico = new Tecnico_Model;
                $equipamentos = $m_tecnico->getUltimosProblemas();
                
                if(!$equipamentos){
                    echo "<div class=\"result0\">Nada novo.</div>";
                }
                
                foreach($equipamentos as $equipamento){
                ?>
                <li>
                    <a href="<?= url("equipamento/$equipamento->idEquipamento") ?>"><img src="<?= url("img/computador.png") ?>" />
                    <?= $equipamento->codigo ?>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </section>
        <section class="inner-box">
            <header>
                <h1>Últimas problemas resolvidos</h1>
            </header>
            <ul class="mostrar mostrar2">
                <?php
                
                $m_tecnico = new Tecnico_Model;
                $equipamentos = $m_tecnico->getUltimosResolvidos();
                
                if(!$equipamentos){
                    echo "<div class=\"result0\">Nada resolvido.</div>";
                }
                
                foreach($equipamentos as $equipamento){
                ?>
                <li>
                    <a href="<?= url("equipamento/$equipamento->idEquipamento") ?>"><img src="<?= url("img/computador.png") ?>" />
                    <?= $equipamento->codigo ?>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </section>
        <section class="inner-box">
            <header>
                <h1>Últimas problemas resolvidos por você</h1>
            </header>
            <ul class="mostrar mostrar2">
                <?php
                
                $m_tecnico = new Tecnico_Model;
                $equipamentos = $m_tecnico->getUltimosResolvidosPorVoce($this->session->userdata("id"));
                
                if(!$equipamentos){
                    echo "<div class=\"result0\">Nada resolvido.</div>";
                }
                
                foreach($equipamentos as $equipamento){
                ?>
                <li>
                    <a href="<?= url("equipamento/$equipamento->idEquipamento") ?>"><img src="<?= url("img/computador.png") ?>" />
                    <?= $equipamento->codigo ?>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </section>
    </div>
</section>
