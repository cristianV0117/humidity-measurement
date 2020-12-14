<html>
    <head>
        <meta charset="UTF-8">
        <title>Grafico</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Cristian Camilo Vasquez Osorio">
        <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="/Public/Css/Styles.css">
    </head>
    <body>
        <div class="container mt-2" >
            <center><h3>Pagina de humedad :D</h3></center>
        </div>
        <hr />
        <div class="container col-md-8 mt-4">
            <div class="card" >
                <div class="card-header">
                    <center><h4>Grafico de humedad el cual se mide en % (Porcentaje)</h4></center>
                </div>
                <div class="mt-1" id="list" ></div>
                <canvas id="charHumidity" height="450" ></canvas>
            </div>
            <button class="btn btn-outline-success mt-3" id="registrar">Almacenar registros al historial</button>
            <a href="/Resources/Views/History.php" ><button class="btn btn-outline-primary mt-3" id="historial">Ver historial</button></a>
        </div>
        <hr />
        <center> © Cristian Camilo Vasquez Osorio</center>
        <br />
        <script type="text/javascript" src="/node_modules/chart.js/dist/Chart.js"></script>
        <script type="text/javascript" src="/Public/Js/Consumer.js"></script>
        <script type="text/javascript" src="/Public/Js/History.js"></script>
    </body>
</html>