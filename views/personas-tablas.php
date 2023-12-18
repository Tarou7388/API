<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <form id="formulario">
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>sede</th>
            <th>apellidos</th>
            <th>nombres</th>
            <th>nrodoc</th>
            <th>fecha</th>
            <th>telefono</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <tr>
          </tr>
        </tbody>
      </table>
      <a href="registrar_empleado.php">
        <button type="button" class="btn btn-primary" >Registrar</button>
      </a>
      <a href="buscar-empleado.php">
        <button type="button" class="btn btn-primary">Buscar</button>
      </a>
      <a href="grafico-empleado-sede.php">
        <button type="button" class="btn btn-primary">grafico</button>
      </a>
      
    </form>
  <script>
    document.addEventListener("DOMContentLoaded", ()=>{
      const parametros = new FormData()

      parametros.append("operacion","searchAll")
      
      function $(id) {return document.querySelector(id)}
      (function (){
        fetch(`../controllers/Empleado.controller.php`,{
          method: "POST",
          body: parametros
        })
          .then(respuesta => respuesta.json())
          .then(datos => {
            console.log(datos)
            const tbody = $("#tbody");
            datos.forEach(element => {
              const tr = document.createElement("tr");

              const tdSede = document.createElement("td");
              tdSede.textContent = element.sede;
              tr.appendChild(tdSede);

              const tdApellidos = document.createElement("td");
              tdApellidos.textContent = element.apellidos;
              tr.appendChild(tdApellidos);

              const tdNombres = document.createElement("td");
              tdNombres.textContent = element.nombres;
              tr.appendChild(tdNombres);

              const tdNrodoc = document.createElement("td");
              tdNrodoc.textContent = element.nrodocumento;
              tr.appendChild(tdNrodoc);

              const tdFecha = document.createElement("td");
              tdFecha.textContent = element.fechanac;
              tr.appendChild(tdFecha);

              const tdTelefono = document.createElement("td");
              tdTelefono.textContent = element.telefono;
              tr.appendChild(tdTelefono);

              tbody.appendChild(tr);
              
            });

          })
          .catch(e => {
            console.error(e)
          })
      })();
    })
  </script>
  </body>
</html>
