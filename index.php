<?php 
    include 'assets/Mobile_Detect.php';
    include 'class/sudoko.php';
 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title></title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/reset.css">
     <link rel="stylesheet" href="css/style.css">
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
        <div class="panel">
            <h1>SOKU PLUS</h1>
            <div class="section group">
                <div class="col span_2_of_3">
                    <?php
                        $so->show('gradienttable');
                        $so->get_script("class/sudoku.js");
                    ?>
                </div>
                <div class="col span_1_of_3">
                    <div class="controls">
                        <h3>NIVEL</h3>
                        <?php 
                            #Crear el menú dependiendo del movil
                            if ($detect->isMobile())  
                                $so->get_menu('class/menu.html',6);
                            else
                                $so->get_menu('class/menu.html',20);
                         ?>
                    </div> 
                </div>
            </div>           
        </div>
    </div>
 </body>
 </html>