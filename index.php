
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" type="text/css" href="class/sudoko.css">
 </head>
 <body>
    <?php 
    include 'class/sudoko.php';
    if (isset($_GET['level'])) {
        $so = new Sudoku($_GET['level']);
    }else{
        $so = new Sudoku();
    }
    $so->get_menu('class/menu.html',20);
    $so->show('gradienttable');
    $so->get_script("class/sudoku.js");
    ?>
 </body>
 </html>