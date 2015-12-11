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
        
    </div>
</section>
