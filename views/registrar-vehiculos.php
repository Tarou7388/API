<!doctype html>
<html lang="es">

<head>
  <title>Buscador de vehiculos</title>
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
        <span class="text-light">Registrar de vehiculos</span>
      </div>
      <div class="card-body">
        <form action="" id="formBusqueda">
          <div class="mb-3">
            <label for="marca" class="form-label">Marca:</label>
            <select name="marca" id="marca" class="form-select" required>
              <option value="">Seleccione</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="Modelo" class="form-label">Modelo :</label>
            <input type="text" id="Modelo" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="Color" class="form-label">Color :</label>
            <input type="text" id="Color" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="tipo" class="form-label">Tipo combustible: </label>
            <select name="tipo" id="tipo" class="form-select" required>
              <option value="">seleccione</option>
              <option value="GSL">GSL</option>
              <option value="DSL">DSL</option>
              <option value="GNV">GNV</option>
              <option value="GLP">GLP</option>
            </select>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3">
              <label for="Peso" class="form-label">Peso :</label>
              <input type="number" id="Peso" class="form-control text-end" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="Afabric" class="form-label">Año de fabricación :</label>
              <input type="number" id="Afabric" class="form-control text-end" required>
            </div>
            <div class="col-md-4 mb-3">
              <label for="Placa" class="form-label">Placa :</label>
              <input type="text" maxlength="7" minlength="7" id="Placa" class="form-control text-end" required>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary" id="guardar" type="submit">Guardar</button>
              <button class="btn btn-secondary" type="reset">Cancelar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", ()=>{
      function $(id) {return document.querySelector(id)}

      //funcion autoejecutada que trae datos
      //y las agrega como <option> a la lista marca
      (function (){
        fetch(`../controllers/Marca.controller.php?operation=listar`)
          .then(respuesta => respuesta.json())
          .then(datos => {
            console.log(datos)
            
            datos.forEach(element => {
              const tagOption = document.createElement("option")
              tagOption.value = element.idmarca
              tagOption.innerHTML = element.marca
              $("#marca").appendChild(tagOption)
            });

          })
          .catch(e => {
            console.error("e")
          })
      })();

      $("#formBusqueda").addEventListener("submit", (event) => {
        //evitamos el envío por ACTION
        event.preventDefault();


        //Envio por AJAX
        if(confirm("¿Desea registrar este vehiculo?")){
          const parametros = new FormData()

          parametros.append("operacion","add")

          parametros.append("idmarca", $("#marca").value)
          parametros.append("modelo",$("#Modelo").value)
          parametros.append("color",$("#Color").value)
          parametros.append("tipocombustible",$("#tipo").value)
          parametros.append("peso",$("#Peso").value)
          parametros.append("afabricacion",$("#Afabric").value)
          parametros.append("placa",$("#Placa").value)

          fetch(`../controllers/Vehiculo.controller.php`, {
            method:"POST",
            body: parametros
          })
            .then(respuesta =>respuesta.json())
            .then(datos=>{
              if(datos.idvehiculo > 0){
                $("#formBusqueda").reset
                alert(`Vehiculo registrado con el ID: ${datos.idvehiculo}`)  
              }
              
            })
            .catch(e=>{
              console.error(e)
            })
        }
      })
    })
  </script>
</body>
</html>