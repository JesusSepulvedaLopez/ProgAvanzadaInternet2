<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        canvas {
            background-color: deepskyblue;
            margin: auto;
        }
    </style>
</head>

<body>
    <canvas id="mycanvas" width="700" height="600">
        tu navegador no soporta canvas
    </canvas>
    <img src="./img/valor.png" id="imagen" style="display:none" alt="" width="50px" height="50px">

    <script type="text/javascript">
        var cv = null;
        var ctx = null;


        function start() {
            var canvas = document.getElementById('mycanvas'); 
            ctx = canvas.getContext('2d');
            paint(ctx);
        }

        window.addEventListener("load", start(),false);

        function paint() {

            //Casa
            ctx.fillStyle = "rgba(244,225,76,1)";
            ctx.fillRect(150, 400, 250, 200);

            //Techo
            ctx.moveTo(150, 400);
            ctx.lineTo(400, 400);
            ctx.lineTo(275, 270);
            ctx.fillStyle = "rgba(98,32,22,1)"
            ctx.fill();

            //ventana
            ctx.moveTo(180, 430)
            ctx.lineTo(240, 430);

            ctx.moveTo(180, 460)
            ctx.lineTo(240, 460);

            ctx.moveTo(180, 490)
            ctx.lineTo(240, 490);

            ctx.moveTo(180, 430)
            ctx.lineTo(180, 490);

            ctx.moveTo(240, 430)
            ctx.lineTo(240, 490);

            ctx.moveTo(210, 430)
            ctx.lineTo(210, 490);

            //Puerta
            ctx.moveTo(290, 540)
            ctx.lineTo(360, 540);

            ctx.moveTo(290, 540)
            ctx.lineTo(290, 600);

            ctx.moveTo(325, 540)
            ctx.lineTo(325, 600);

            ctx.moveTo(360, 540)
            ctx.lineTo(360, 600);
            ctx.stroke();

            ctx.beginPath();
            ctx.arc(310, 565, 6, 0, 2 * Math.PI);
            ctx.fill();
            ctx.closePath();
            ctx.stroke();

            ctx.beginPath();
            ctx.arc(340, 565, 6, 0, 2 * Math.PI);
            ctx.fill();
            ctx.closePath();
            ctx.stroke();

            //Tronco
            ctx.fillStyle = "rgba(102,67,41,1)";
            ctx.fillRect(580, 400, 120, 200);

            //Arbol
            ctx.beginPath();
            ctx.arc(650, 230, 200, 0, 2 * Math.PI);
            ctx.fillStyle = "green";
            ctx.fill();
            ctx.closePath();

            //Manzanas
            ctx.beginPath();
            ctx.arc(650, 120, 20, 0, 2 * Math.PI);
            ctx.fillStyle = "red";
            ctx.fill();
            ctx.closePath();

            ctx.beginPath();
            ctx.arc(550, 240, 20, 0, 2 * Math.PI);
            ctx.fill();
            ctx.closePath();

            ctx.beginPath();
            ctx.arc(630, 340, 20, 0, 2 * Math.PI);
            ctx.fill();
            ctx.closePath();

            //Nube
            ctx.beginPath();
            ctx.arc(350, 120, 40, 0, 2 * Math.PI);
            ctx.fillStyle = "white";
            ctx.fill();
            ctx.closePath();

            ctx.beginPath();
            ctx.arc(300, 80, 40, 0, 2 * Math.PI);
            ctx.fill();
            ctx.closePath();

            ctx.beginPath();
            ctx.arc(300, 150, 40, 0, 2 * Math.PI);
            ctx.fill();
            ctx.closePath();

            ctx.beginPath();
            ctx.arc(280, 120, 40, 0, 2 * Math.PI);
            ctx.fill();
            ctx.closePath();

            ctx.beginPath();
            ctx.arc(250, 80, 40, 0, 2 * Math.PI);
            ctx.fill();
            ctx.closePath();

            ctx.beginPath();
            ctx.arc(250, 150, 40, 0, 2 * Math.PI);
            ctx.fill();
            ctx.closePath();

            ctx.beginPath();
            ctx.arc(200, 120, 40, 0, 2 * Math.PI);
            ctx.fill();
            ctx.closePath();

        };

        

    </script>
</body>

</html>