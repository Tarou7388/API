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
        <div class="signup-form-container">
            <form role="form" id="frmEmpleados" autocomplete="off">
                <div class="form-header">
                    <h3 class="form-title"><i class="fa fa-user"></i> Sign Up</h3>
                    <div class="pull-right">
                        <h3 class="form-title"><span class="glyphicon glyphicon-pencil"></span></h3>
                    </div>
                </div>
                <div class="form-body">
                    <div class="form-group">
                        <label for="sede" class="form-label">Sede:</label>
                        <select name="sede" id="sede" class="form-select" required>
                            <option value="" selected disabled="true">Seleccione</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="nrodocumento">Número de Documento</label>
                        <input type="text" class="form-control" id="nrodocumento" name="nrodocumento" required>
                    </div>
                    <div class="form-group">
                        <label for="fechanac">Fecha de Nacimiento</label>
                        <input type="text" class="form-control" id="fechanac" name="fechanac" placeholder="AAAA-MM-DD"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            function $(id) { return document.querySelector(id) }
            (function () {
                fetch(`../controllers/Sede.controller.php?operation=listar`)
                    .then(respuesta => respuesta.json())
                    .then(datos => {
                        console.log(datos)

                        datos.forEach(element => {
                            const tagOption = document.createElement("option")
                            tagOption.value = element.idsede
                            tagOption.innerHTML = element.sede
                            $("#sede").appendChild(tagOption)
                        });

                    })
                    .catch(e => {
                        console.error(e)
                    })
            })();
            $("#frmEmpleados").addEventListener("submit", (event) => {
                //evitamos el envío por ACTION
                event.preventDefault();


                //Envio por AJAX
                if (confirm("¿Desea registrar este Empleado?")) {

                    const parametros = new FormData()
                    parametros.append("operacion", "add")
                    parametros.append("idsede", $("#sede").value)
                    parametros.append("apellidos", $("#apellidos").value)
                    parametros.append("nombres", $("#nombres").value)
                    parametros.append("nrodocumento", $("#nrodocumento").value)
                    parametros.append("fechanac", $("#fechanac").value)
                    parametros.append("telefono", $("#telefono").value)

                    fetch(`../controllers/Empleado.controller.php`, {
                        method: "POST",
                        body: parametros
                    })
                        .then(respuesta => respuesta.json())
                        .then(datos => {
                            if (datos.idobtenido > 0) {
                                $("#frmEmpleados").reset
                                alert(`Empleado registrado con el ID: ${datos.idobtenido}`)
                            }

                        })
                        .catch(e => {
                            console.error(e)
                        })
                }
            })
        })
    </script>
</body>

</html>