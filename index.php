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
    <img src="./img/valor.png" id="imagen" style="display:none" alt="" width="50px" height="50px">

    <script type="text/javascript">
        var cv = document.getElementById("mycanvas");

        var ctx = cv.getContext('2d');

        var color = "green";

        var fig = "arc";

        //ctx.strokeStyle="white";
        // ctx.strokeRect(50,50,150,150);

        ctx.strokeStyle = "red";
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
        /*  ctx.font="40px Arial";
         ctx.fillText("Jesus Sepulveda",100,50);

         ctx.strokeText("Basta Freezer!!",100,100); */

        //gradiante Lineal
        /*   var grd = ctx.createLinearGradient(0, 0, 200, 0);
          grd.addColorStop(0, "red");
          grd.addColorStop(0.5, "green");
          grd.addColorStop(1, "blue");

          ctx.fillStyle = grd;
          ctx.fillRect(0, 400, 200, 80); */

        //gradiante Circular
        /*  grd = ctx.createRadialGradient(75, 50, 5, 90, 60, 100);
         grd.addColorStop(0, "green");
         grd.addColorStop(1, "red");

         ctx.fillStyle = grd;
         ctx.fillRect(10, 10, 150, 100); */

        //drawImage
        var img = document.getElementById("imagen");
        ctx.drawImage(img, 10, 10, 100, 100);

        cv.addEventListener("click", function(e) {
            ctx.fillStyle = color;
            if (fig == 'arc') {
                ctx.beginPath();
                ctx.arc(e.offsetX, e.offsetY, 40, 0, 2 * Math.PI);
                ctx.fill();
                ctx.stroke();
            }else{
                ctx.fillRect(e.offsetX-20, e.offsetY-20, 40, 40);
                ctx.strokeRect(e.offsetX-20, e.offsetY-20, 40, 40);
            }

        });

        cv.addEventListener("mouseover", function(e) {
            color = random_rgba();
        });

        cv.addEventListener("mouseout", function(e) {
            fig = (fig == "arc") ? "rec" : "arc";
        });

        function random_rgba() {
            var o = Math.round,
                r = Math.random,
                s = 255;
            return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + r().toFixed(1) + ')';
        }
    </script>

</body>

</html>