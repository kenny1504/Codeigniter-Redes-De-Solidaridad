<?=  $this -> section ( 'Nombre-aslide' )  ?> 
            <?php        
                $session = \Config\Services::session();    // uso de varibles de session
                $session->start();
                echo $_SESSION['Nombre'];
            ?>
        <?=  $this -> endSection () ?>
        <?=  $this -> section ( 'Nombre-hearder1' )  ?> 
            <?php        
                $session = \Config\Services::session();    // uso de varibles de session
                $session->start();
                echo $_SESSION['Nombre'];
            ?>
        <?=  $this -> endSection () ?>
        <?=  $this -> section ( 'Nombre-hearder2' )  ?> 
            <?php        
                $session = \Config\Services::session();    // uso de varibles de session
                $session->start();
                echo $_SESSION['Nombre'];
            ?>
        <?=  $this -> endSection () ?>
        <?=  $this -> section ( 'rol-hearder' )  ?> 
             <?php        
                $session = \Config\Services::session();    // uso de varibles de session
                $session->start();
                echo $_SESSION['Descripcion'];
            ?>
        <?=  $this -> endSection () ?>
        <?=  $this -> section ('Vencimiento') ?> 
            <?php        
                $session = \Config\Services::session();    // uso de varibles de session
                $session->start();
                echo $_SESSION['FechaDeVencimiento'];
            ?>
        <?=  $this -> endSection () ?>    