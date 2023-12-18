
<!doctype html>
<html lang="es">
  <head>
    <title>Buscador de vehiculos</title>
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
  <div class="container">
    <div class="card mt-2">
      <div class="card-header bg-primary">
        <span class="text-light">Buscador de vehiculos</span>
      </div>
      <div class="card-body">
        <form action="" id="formBusqueda">
          <div class="input-group mb-3">
            <input type="text" class="form-control text-cneter" maxlength="7" id="Placa" autofocus
              placeholder="Escribe la placa">
            <button class="btn btn-success" type="button" id="btBuscar">Buscar</button>
          </div>
          <small id="status"></small>
          <div class="mb-3">
            <label for="marca" class="form-lable">Marca :</label>
            <input disabled type="text" id="Marca" class="form-control" readonly>
          </div>
          <div class="mb-3">
            <label for="Modelo" class="form-lable">Modelo :</label>
            <input disabled type="text" id="Modelo" class="form-control" readonly>
          </div>
          <div class="mb-3">
            <label for="Color" class="form-lable">Color :</label>
            <input disabled type="text" id="Color" class="form-control" readonly>
          </div>
          <div class="mb-3">
            <label for="Tipo" class="form-lable">Tipo Comb :</label>
            <input disabled type="text" id="Tipo" class="form-control" readonly>
          </div>
          <div class="mb-3">
            <label for="Peso" class="form-lable">Peso :</label>
            <input disabled type="text" id="Peso" class="form-control" readonly>
          </div>
          <div class="mb-3">
            <label for="Afabric" class="form-lable">Año de fabricación :</label>
            <input disabled type="text" id="Afabric" class="form-control" readonly>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", ()=>{
      function $(id) {return document.querySelector(id)}

      function buscarplaca(){
        const placa = $("#Placa").value

        if(placa!=""){
          const parametros = new FormData()
          parametros.append("operacion", "search")
          parametros.append("placa",placa)
          $("#status").innerHTML="esperando..."
          fetch(`../controllers/Vehiculo.controller.php`,{
            method:"POST",
            body : parametros
          })
            .then(respuesta => respuesta.json())
            .then(datos=>{
              if(!datos){
                $("#status").innerHTML="No se encontró"
                $("#formBusqueda").reset()
                $("#placa").focus()
              }
              else{
                $("#status").innerHTML=""
                $("#Marca").value= datos.marca
                $("#Modelo").value= datos.modelo
                $("#Color").value= datos.color
                $("#Tipo").value= datos.tipocombustible
                $("#Peso").value= datos.peso
                $("#Afabric").value= datos.afabricacion
              }
              
            })
            .catch(e => {
              console.error(e)
            })
        }
      }

      $("#Placa").addEventListener("keypress", (event)=>{
        if (event.keyCode == 13){
          buscarplaca()
        }
      });

      $("#btBuscar").addEventListener("click", buscarplaca)

    })
  </script>

  </body>
</html>