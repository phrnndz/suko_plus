<?php 
    include 'assets/Mobile_Detect.php';
    include 'class/sudoko.php';
 ?>
 
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" type="text/css" href="class/sudoko.css">
     <link rel="stylesheet" type="text/css" href="css/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     </head>
 <body>
    <?php 
    $detect = new Mobile_Detect(); 
    
    if (isset($_GET['level'])) 
        $so = new Sudoku($_GET['level']);
    else
        $so = new Sudoku();
    ?>
    <div class="container">
    <fieldset>
        <div class="menu">
        <h3>Suko Plus v1.0</h3>
            <?php 
                #Crear el menú dependiendo del movil
                if ($detect->isMobile())  
                    $so->get_menu('class/menu.html',8);
                else
                    $so->get_menu('class/menu.html',20);
             ?>
        </div>
        <div class="row">
            <?php
                $so->show('gradienttable');
                $so->get_script("class/sudoku.js");
            ?>
        </div>
        <p><STRONG>Instrucciones: </STRONG></p>
        <p>Sumar de forma horizontal y vertical</p>
    </fieldset>
    </div>
 </body>
 </html>