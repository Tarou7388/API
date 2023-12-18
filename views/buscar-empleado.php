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
    <div class="container">
        <div class="card mt-2">
            <div class="card-header bg-primary">
                <span class="text-light">Buscador de vehiculos</span>
            </div>
            <div class="card-body">
                <form action="" id="formBusqueda">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control text-cneter" maxlength="7" id="idempleado" autofocus
                            placeholder="Escribe el id">
                        <button class="btn btn-success" type="button" id="btBuscar">Buscar</button>
                    </div>
                    <small id="status"></small>
                    <div class="mb-3">
                        <label for="sede" class="form-lable">Sede :</label>
                        <input disabled type="text" id="sede" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-lable">Apellidos :</label>
                        <input disabled type="text" id="apellidos" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombres" class="form-lable">Nombres :</label>
                        <input disabled type="text" id="nombres" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nrodocumento" class="form-lable">Numero de documento :</label>
                        <input disabled type="text" id="nrodocumento" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="fechanac" class="form-lable">Fecha de nacimineto :</label>
                        <input disabled type="text" id="fechanac" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-lable">Telefono :</label>
                        <input disabled type="text" id="telefono" class="form-control" readonly>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function $(id) { return document.querySelector(id) }
            function buscarid() {
                const id = $("#idempleado").value
                if (id != "") {
                    const parametros = new FormData()
                    parametros.append("operacion", "search")
                    parametros.append("idempleado", id)
                    $("#status").innerHTML = "esperando..."
                    fetch(`../controllers/Empleado.controller.php`, {
                        method: "POST",
                        body: parametros
                    })
                        .then(respuesta => respuesta.json())
                        .then(datos => {
                            if (!datos) {
                                $("#status").innerHTML = "No se encontró"
                                $("#formBusqueda").reset()
                                $("#idempleado").focus()
                            }
                            else {
                                $("#status").innerHTML = ""
                                $("#sede").value = datos.sede
                                $("#apellidos").value = datos.apellidos
                                $("#nombres").value = datos.nombres
                                $("#nrodocumento").value = datos.nrodocumento
                                $("#fechanac").value = datos.fechanac
                                $("#telefono").value = datos.telefono
                            }
                        })
                        .catch(e => {
                            console.error(e)
                        })
                }
            }
            $("#idempleado").addEventListener("keypress", (event) => {
                if (event.keyCode == 13) {
                    buscarid()
                }
            });

            $("#btBuscar").addEventListener("click", buscarid)
        })
    </script>
</body>

</html>