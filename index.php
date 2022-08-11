<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas</title>
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

    <script type="text/javascript">
        var cv = document.getElementById("mycanvas");

        var ctx = cv.getContext('2d');

        //ctx.strokeStyle="white";
        // ctx.strokeRect(50,50,150,150);

          ctx.strokeStyle="red";
        //ctx.strokeRect(150,150,150,150);

        //Cuadrado
    //    ctx.fillStyle = "rgb(200,0,0)";
     //   ctx.fillRect(10, 10, 55, 50);

        ctx.fillStyle = "rgb(0,0,200,0.5)";
    //    ctx.fillRect(50, 50, 55, 50);

    //    ctx.fillStyle = "rgb(0,200,0)";
    //    ctx.fillRect(90, 90, 55, 50);

        //Lineas
    //    ctx.moveTo(145, 140);
    //    ctx.lineTo(250, 240);
    //    ctx.stroke();

    //    ctx.moveTo(250, 240);
    //    ctx.lineTo(480, 430);
    //    ctx.lineTo(430, 300);
    //    ctx.lineTo(250, 240);
    //    ctx.fill();
    //    ctx.stroke();

        //arc (circulo)
     /*    ctx.beginPath();
        ctx.arc(150, 150, 70, 0, 2 * Math.PI);
        ctx.stroke();

        ctx.beginPath();
        ctx.arc(250, 350, 70, 0, 2 * Math.PI);
        ctx.fill(); */

        //Texto
        ctx.font="40px Arial";
        ctx.fillText("Jesus Sepulveda",100,50);

        ctx.strokeText("Basta Freezer!!",100,100);
    </script>

</body>

</html>