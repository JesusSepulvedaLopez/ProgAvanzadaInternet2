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
        var player1 = null;
        var player2 = null;
        var super_x = 240;
        var super_y = 240;

        var direction = "right";
        var score = 0;
        var speed = 5;
        var pause = false;

        var lastPress = null;
        var walls = new Array();

        function start() {
            cv = document.getElementById("mycanvas");
            ctx = cv.getContext('2d');

            player1 = new Cuadrado(super_x, super_y, 40, 40, "yellow");

            player2 = new Cuadrado(randomNumber(460), randomNumber(460), 40, 40, "yellow");

            walls.push(new Cuadrado(80, 420, 340, 30, "gray"));
            walls.push(new Cuadrado(80, 120, 340, 30, "gray"));
            walls.push(new Cuadrado(80, 220, 30, 120, "gray"));
            walls.push(new Cuadrado(400, 220, 30, 120, "gray"));

            paint();
        }


        function paint() {

            window.requestAnimationFrame(paint);

            ctx.fillStyle = "cyan";
            ctx.fillRect(0, 0, 500, 500);

            ctx.fillStyle = "black";
            ctx.font = "20px Arial";
            ctx.fillText("SCORE: " + score + " SPEED: " + speed, 30, 20);

            player1.c = random_rgba();
            player1.dibujar(ctx);

            player2.dibujar(ctx);

            for (var i = 0; i < walls.length; i++) {
                walls[i].dibujar(ctx);
            }

            if (!pause) {
                update();
            } else {
                ctx.fillStyle = "rgba(0,0,0,0.5)";
                ctx.fillRect(0, 0, 500, 500);

                ctx.fillStyle = "white";
                ctx.fillText("P A U S E", 210, 210);
            }

            /* ctx.fillStyle = random_rgba();
            ctx.fillRect(super_x, super_y, 40, 40);
            ctx.strokeRect(super_x, super_y, 40, 40); */


        };

        function update() {

            if (!pause) {
                if (lastPress == 39) direction = 'right';
                if (lastPress == 37) direction = 'left';
                if (lastPress == 38) direction = 'up';
                if (lastPress == 40) direction = 'down';

                if (direction == 'right') player1.x += speed;
                if (direction == 'left') player1.x -= speed;
                if (direction == 'up') player1.y -= speed;
                if (direction == 'down') player1.y += speed;

                if (player1.x > 500) player1.x = 0;
                if (player1.y > 500) player1.y = 0;
                if (player1.x < 0) player1.x = 500;
                if (player1.y < 0) player1.y = 500;
            }


            if (player1.se_tocan(player2)) {
                player2.x = randomNumber(460);
                player2.y = randomNumber(460);

                score += 10;
                speed += 5;
            }

            for (var i = 0; i < walls.length; i++) {

                if (player1.se_tocan(walls[i])) {
                    /* if (direction == 'right') player1.x -= speed;
                    if (direction == 'left') player1.x += speed;
                    if (direction == 'up') player1.y += speed;
                    if (direction == 'down') player1.y -= speed; */

                     score --;

                     player1.x=10;
                     player1.y=20;  
                }

                if (player2.se_tocan(walls[i])) {
                    player2.x = randomNumber(460);
                    player2.y = randomNumber(460);
                }

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

        function Cuadrado(x, y, w, h, c) {
            this.x = x;
            this.y = y;
            this.w = w;
            this.h = h;
            this.c = c;

            this.dibujar = function(ctx) {
                ctx.fillStyle = this.c;
                ctx.fillRect(this.x, this.y, this.w, this.h);
                ctx.strokeRect(this.x, this.y, this.w, this.h);
            }

            this.se_tocan = function(target) {

                if (this.x < target.x + target.w &&

                    this.x + this.w > target.x &&
                    this.y < target.y + target.h &&
                    this.y + this.h > target.y) {
                    return true;
                }

            };
        }

        function random_rgba() {
            var o = Math.round,
                r = Math.random,
                s = 255;
            return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + r().toFixed(1) + ')';
        }

        function randomNumber(max) {
            return Math.floor(Math.random() * max);
        }


        document.addEventListener("keydown", function(e) {
            /* //arriba
            if (e.keyCode == 87 || e.keyCode == 38) {
                direction = "up";
            }

            //abajo
            if (e.keyCode == 83 || e.keyCode == 40) {
                direction = "down";
            }

            //izquierda
            if (e.keyCode == 65 || e.keyCode == 37) {
                direction = "left";
            }

            //derecha
            if (e.keyCode == 68 || e.keyCode == 39) {
                direction = "right";
            } */

            lastPress = e.keyCode;

            //pause
            if (e.keyCode == 32) {
                pause = (pause) ? false : true;
            }

        });
    </script>
</body>

</html>