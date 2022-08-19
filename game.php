<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        canvas {
            background-color: rgb(199, 181, 181);
            margin: auto;
        }
    </style>
</head>

<body>
    <canvas id="mycanvas" width="500" height="500">
        tu navegador no soporta canvas
    </canvas>
    <img src="./img/valor.png" id="imagen" style="display:none" alt="" width="50px" height="50px">

    <script type="text/javascript">
        var cv = null;
        var ctx = null;
        var player1=null;
        var super_x = 240;
        var super_y = 240;

        function start() {
            cv = document.getElementById("mycanvas");
            ctx = cv.getContext('2d');

            player1=new Cuadrado(super_x,super_y,40,40,"yellow");

            paint();
        }


        function paint() {

            window.requestAnimationFrame(paint);

            ctx.fillStyle = "cyan";
            ctx.fillRect(0, 0, 500, 500);

            player1.c=random_rgba();
            player1.dibujar(ctx);

            /* ctx.fillStyle = random_rgba();
            ctx.fillRect(super_x, super_y, 40, 40);
            ctx.strokeRect(super_x, super_y, 40, 40); */

            update();
        };

        function update() {
            player1.x += 5;
            if (player1.x > 500) {
                player1.x=0;
            }
        }

        window.addEventListener("load", start);

        window.requestAnimationFrame = (function() {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                function(callback) {
                    window.setTimeout(callback, 17);
                };
        }());

        function Cuadrado(x,y,w,h,c){
            this.x=x;
            this.y=y;
            this.w=w;
            this.h=h;
            this.c=c;

            this.dibujar= function(ctx){
                ctx.fillStyle = this.c;
                ctx.fillRect(this.x, this.y, this.w, this.h);
                ctx.strokeRect(this.x, this.y, this.w, this.h);
            }
        }

        function random_rgba() {
            var o = Math.round,
                r = Math.random,
                s = 255;
            return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + r().toFixed(1) + ')';
        }


        /* document.addEventListener("keydown", function(e) {
            //arriba
            if (e.keyCode == 87 || e.keyCode == 38) {
                super_y -= 10;
            }

            //abajo
            if (e.keyCode == 83 || e.keyCode == 40) {
                super_y += 10;
            }

            //izquierda
            if (e.keyCode == 65 || e.keyCode == 37) {
                super_x -= 10;
            }

            //derecha
            if (e.keyCode == 68 || e.keyCode == 39) {
                super_x += 10;
            }

            paint();

        }); */
    </script>
</body>

</html>