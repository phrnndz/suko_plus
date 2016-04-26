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
    
    if (isset($_GET['caja']) && isset($_GET['level']))
    {
       $so = new Sudoku($_GET['caja']);
       $so->level($_GET['level']);
    }
    else
    {
        $so = new Sudoku();
    }
    ?>
    <div class="container">
        <div class="panel center">
            <h1>SOKU PLUS <span>v1.1</span></h1>
            <div class="section group">
                <div class="col span_3_of_3">
                    <div class="controls">
                        <?php 
                            #Crear el menú dependiendo del movil
                            if ($detect->isMobile())  
                                $so->get_menu('class/menu.html',6);
                            else
                                $so->get_menu('class/menu.html',20);
                         ?>
                    </div> 
                </div>
                <div class="col span_3_of_3">
                    <?php
                        $so->show('gradienttable');
                        $so->get_script("class/sudoku.js");
                    ?>
                </div>
            </div>           
        </div>
    </div>
        <footer>
        <p>Developed by <strong><a href="https://github.com/omferito" target="_blank">Omar Vásquez</a></strong> – Designed by <strong><a href="https://github.com/phrnndz" target="_blank">Pamela Hernández</a></strong></p>
    </footer>
    <script>

    </script>
 </body>
 </html>