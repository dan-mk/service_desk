<header id="header">
    <div class="wrap">
        <a class="tecnico_header" href="<?php
        if($logged){
            echo url("tecnico");
        }else{
            echo url("logon");
        }
        ?>">
            <img src="<?= url("img/tecnico_header.png"); ?>" />
            <span>
                <?php 
                if($logged){
                    $m_tecnico = new Tecnico_Model;
                    $tecnico = $m_tecnico->getTecnicoById($this->session->userdata("id"));
                    echo $tecnico[0]->nome;
                } else{
                    echo "Entrar como técnico";
                }    
                ?>
            </span>
        </a>
        <?php
        if($logged){
        ?>
        <a class="logout" href="<?= url("logon/logout") ?>">
            <img src="<?= url("img/logout.png") ?>" alt="Sair" />
        </a>
        <?php
        }
        ?>
        <a class="logo" href="<?= url("") ?>">
            <img src="<?= url("img/logo_ifsc.png"); ?>" />
            <h1>
                Service Desk TI<br>
                IFSC Campus Chapecó
            </h1>
        </a>
    </div>
</header>
