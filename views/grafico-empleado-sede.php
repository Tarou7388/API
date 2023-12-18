<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<body>
    <div style="width: 70%; margin: auto;">
        <canvas id="grafica"></canvas>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function $(id) { return document.querySelector(id) }
        let grafico = $("#grafica").getContext("2d");
        (function () {
            fetch(`../controllers/Sede.controller.php?operation=contar`)
                .then(respuesta => respuesta.json())
                .then(datos => {
                    const chart = new Chart(grafico, {
                        type: "bar",
                        data: {
                            labels: datos.map(row => row.sede),
                            datasets: [
                                {
                                    label: "Cantidad de empleados por sedes",
                                    data: datos.map(row => row.cantidad)
                                }
                            ]
                        }
                    })
                })
                .catch(e => {
                    console.error(e)
                })
        })();

    </script>
</body>

</html>