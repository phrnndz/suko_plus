<?php 
/**
 * 
 */
error_reporting(E_ALL ^ E_NOTICE);
 class Sudoku
 {
     private $dimension;
     private $minimo;
     private $maximo;
     private $mat;
     private $html;
     private $miFuncion = 'sudoku()';
     public  $src_js;

     function __construct($dim=2,$min=1,$max=9)
     {
        # comprovar que halla un dimension...
        $this->dimension = $dim;
        $this->minimo = $min;
        $this->maximo = $max;
     }

     private function createMatriz()
     {
        for ($i=0; $i < $this->dimension; $i++)
        { 
            for ($j=0; $j < $this->dimension ; $j++) 
            { 
                $matriz[$i][$j]= 
                rand($this->minimo, $this->maximo); 
            }
        }#Fin For
        $this->mat = $matriz; 
     }#FcreateMatriz

     private function CreateHtml($class_table='')
     {
        $this->html='<table class="'.$class_table.'">';
        foreach ($this->mat as $key=>$value) 
        {
            $this->html.='<tr>';
            $rs=0;
            foreach ($value as $k => $v) 
            {
                $vertical[$k]+=$v;
                $rs = $rs + $v;
                $op = rand(0,2);
                $id = $key.'-'.$k;
                if ($op>0) 
                    $this->html.=$this->input($id);
                else
                    $this->html.=$this->input($id,$v);
            }
            $this->html.='<td align="center" id="f'.$key.'">'.$rs.'</td>';
            $this->html.='</tr>';
        }
        $this->html.='<tr>';
        foreach ($vertical as $key => $value) 
        {
            $this->html.='<td align="center" id="c'.$key.'" font-color="red">'.$value.'</td>';
        }
        $this->html.='</tr></table>';
     }

     private function input($id='',$dato='')
     {
        $des = (empty($dato)) ? '' : 'disabled' ;
        $im = '<td><input onkeyup="'.$this->miFuncion.'" 
            id="'.$id.'" type="number" name="" value="'.$dato.'" '.$des.'></td>';
        return $im;
     }

     public function show($class_table='')
     {
        $this->createMatriz();
        $this->createHtml($class_table);
        echo $this->html;
     }  

     public function get_script($src_js=""){
        $js = file_get_contents($src_js);
        $res = str_replace('%dato%',""+$this->dimension,$js);
        echo $res;
     }   

     public function get_menu($src_menu="",$limit = 16 ){
        $menu = file_get_contents($src_menu);
        $lista = "";
        for ($i=3; $i < $limit ; $i++) { 
            # code...
            $lista .='<option value="'.$i.'"> '.$i.'x'.$i.' cajas</option>';
        }
        $res = str_replace('%lista%',$lista,$menu);
        echo $res;
     }

 } ?>