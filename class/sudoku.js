    <script type="text/javascript">
        var x=%dato%;
        
        // body...  
        var vertical = new Array(this.x);
        var horizontal = new Array(this.x);

        function sudoku(){
            this.inicializar();
            this.analizar();
            this.mostrar();
        };

        function inicializar () {
            //Inicializar los arreglos.
            for (var i = 0; i < vertical.length; i++) {
                 this.vertical[i]=0;
                 this.horizontal[i]=0;
             };
        }

         function analizar(){
              for (var i = 0; i < x; i++) {
                f = 0;
                for (var j = 0; j < x; j++) {
                  var  celda = document.getElementById(i+"-"+j).value;
                  if (celda == "") {celda=0}else{celda = parseFloat(celda)}
                  this.vertical[j] = celda + this.vertical[j];
                  f=  celda + f;
                };
                this.horizontal[i]=f;
            };   
         }

         function wuii(){
            alert("Wiii Felicidades lo lograste");
         }
       
         function mostrar(){
            var ft = 0;
            var ct = 0;
            atributo = 'bgcolor'; color='green'; 
            for (var v = 0; v < x; v++) {
                 r = document.getElementById("c"+v);
                 total = parseFloat(r.innerHTML);
                if (total == this.vertical[v]) {
                    r.setAttribute(atributo,color);
                    r.setAttribute("style", "color:white;");
                    ct+= 1;
                }else{
                    ct+= 0;
                    r.setAttribute(atributo,"");
                    r.setAttribute("style", "color:black;");
                };
            };

            for (var f = 0; f < x; f++) {
                 r = document.getElementById("f"+f);
                 total = parseFloat(r.innerHTML);
                if (total == this.horizontal[f]) {
                    r.setAttribute(atributo,color);
                    r.setAttribute("style", "color:white;");
                    ft+= 1;
                }else{
                    ft+=0;
                    r.setAttribute(atributo,"");
                    r.setAttribute("style", "color:black;");
                };
            };
         
            if (ft==this.x && ct==this.x) { this.wuii()};
         }

    </script>