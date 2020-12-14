<html>
    <head>
        <meta charset="UTF-8">
        <title>Historial</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Cristian Camilo Vasquez Osorio">
        <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="/Public/Css/Styles.css">
    </head>
    <body>
        <div class="container mt-5" >
            <center><h3>Historial de registros de humedad</h3></center>
        </div>
        <hr />
        <div class="container col-md-8 mt-4">
            <div class="card" >
                <div class="card-header">
                    <center><h4>Tabla que muestra los registros de las humedades de las 3 ciudades</h4></center>
                </div>
                <div class="card-body">
                    <table id="tablaHistorial" class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Miami</th>
                                <th scope="col">Ohio</th>
                                <th scope="col">New York</th>
                                <th scope="col">Fecha registro</th>
                            </tr>
                        </thead>
                        <tbody id="bodyHistorial" >
                            
                        </tbody>
                    </table>
                    <a href="/index.php" ><button class="btn btn-outline-primary" >Atras | Ver graficos</button></a>
                </div>
            </div>
        </div>
        <hr />
        <center> © Cristian Camilo Vasquez Osorio</center>
        <br />
        <script type="text/javascript" src="/Public/Js/History.js"></script>
    </body>
</html>