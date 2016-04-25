<?php 
error_reporting(E_ALL ^ E_NOTICE);
/** 
*
* @Objeto para la creacion de un juego de lógica
* @versión: 1.0.0      @modificado: 25 de abril del 2016
* @autor: Omar Vasquez
*
*/

 class Sudoku
 {
     private $_dimension_matriz;
     private $_minimoValorAceptado;
     private $_maximoValorAceptado;
     private $arregloMatriz;
     private $html;
     private $miFuncion = 'sudoku()';
     public  $src_js;

     /**
      * @params $dim tamaño de la tabla.
      * @params $min el parametro minimo del de las cajas 
      * @params $max el parametro maximo del de las cajas 
      */
     function __construct($dim=2,$min=1,$max=9)
     {
        # comprovar que halla un _dimension_matriz...
        $this->_dimension_matriz = $dim;
        $this->_minimoValorAceptado = $min;
        $this->_maximoValorAceptado = $max;
     }

     private function createMatriz()
     {
        for ($i=0; $i < $this->_dimension_matriz; $i++)
        { 
            for ($j=0; $j < $this->_dimension_matriz ; $j++) 
            { 
                #Creamos la matriz con variables aleatorias
                $matriz[$i][$j]= rand($this->_minimoValorAceptado,
                                             $this->_maximoValorAceptado); 
            }
        }#Fin For
        $this->arregloMatriz = $matriz; 
     }

     /**
      * @params $class_table referencia a clase css 
      */
     private function CreateHtml($class_table)
     {
        //contatenamos para crear la tabla en html 
        $this->html='<table class="'.$class_table.'">';
        foreach ($this->arregloMatriz as $key=>$value) 
        {
            $this->html.='<tr>';
            $suma_horizontal=0;
            foreach ($value as $k => $v) 
            {
                $arregloSumavertical[$k] += $v;
                $suma_horizontal = $suma_horizontal + $v;
                $op = rand(0,2);
                $id_input = $key.'-'.$k;
                if ($op>0) 
                    $this->html .= $this->input($id_input);
                else
                    $this->html .= $this->input($id_input,$v);
            }
            $this->html .=('<td align="center" id="f'
                                                 .$key.'">'.$suma_horizontal.'</td></tr>');
        }
        $this->html .=('<tr>');
        foreach ($arregloSumavertical as $key => $value) 
        {
            $this->html .=('<td align="center" id="c'
                                          .$key.'" >'.$value.'</td>');
        }
        $this->html.=('</tr></table>');
     }

     /**
      * @params $id_input referencia del input html
      * @params $dato boolean disabled input 
      */
     private function input($id_input='',$dato='')
     {
        $desactivar = (empty($dato)) ? '' : 'disabled' ;
        $html_input = ('<td><input onkeyup="'.$this->miFuncion.'" 
                             id="'.$id_input.'" type="number" size=1  value="'
                                                    .$dato.'" '.$desactivar.'></td>');
        return $html_input;
     }

     /**
      * @params $class_table referencia a clase css 
      */
     public function show($class_table='')
     {
        $this->createMatriz();
        $this->createHtml($class_table);
        echo $this->html;
     }  

     /**
      * @params $src_js referencia a script js 
      */
     public function get_script($src_js=""){
        $js = file_get_contents($src_js);
        $enviar_dimension_js = str_replace('%dato%',""+$this->_dimension_matriz,$js);
        echo $enviar_dimension_js;
     }   

     public function get_menu($src_menu="",$limit = 16 ){
        $menu = file_get_contents($src_menu);
        $lista = "";
        for ($i=2; $i < $limit ; $i++) { 
            $lista .=('<option value="'.$i.'"> '
                            .$i.'x'.$i.' cajas</option>');
        }
        $listaMenu = str_replace('%lista%',$lista,$menu);
        echo $listaMenu;
     }

 } ?>