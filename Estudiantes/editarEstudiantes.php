<?php

require_once("config.php");

$data = new Config(); //Llamada el constructor el "NEW"

$id = $_GET["id"];

$data->setId($id);

$record = $data->selectOne(); //Que Guarda la fila para editar
/* print_r($record); */ //Imprime

$val = $record[0]; //Captura el Array
/* echo "<br> ";
echo "<br> ";
print_r($val); */

if (isset($_POST["editar"])) { //Colocar la variable del Boton o lo que desea cambiar
    $data->setNombres($_POST["nombres"]);
    $data->setDireccion($_POST["direccion"]);
    $data->setLogros($_POST["logros"]);
    $data->setSkills($_POST["skills"]);
    $data->setIngles($_POST["ingles"]);
    $data->setSer($_POST["ser"]);
    $data->setRewiew($_POST["rewiew"]);
    $data->setEspecialidad($_POST["especialidad"]); //se llama igual que el name del input

    $data->update();
    echo "<script>alert('Los Datos Editados del estudiante ha sido Exitosamente');document.location='estudiantes.php'</script>";

}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Estudiante</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="css/estudiantes.css">

</head>

<body>
  <div class="contenedor">

    <div class="parte-izquierda">

      <div class="perfil">
        <h3 style="margin-bottom: 2rem;">Camp Skiler.</h3>
        <img src="images/ana.png" alt="" class="imagenPerfil">
        <h3>Ana Yamada</h3>
      </div>
      <div class="menus">
        <a href="home.html" style="display: flex;gap:2px;">
          <i class="bi bi-house-door"> </i>
          <h3 style="margin: 0px;font-weight: 800;">Home</h3>
        </a>
        <a href="/Estudiantes/Estudiantes.html" style="display: flex;gap:2px;">
          <i class="bi bi-people"></i>
          <h3 style="margin: 0px;">Estudiantes</h3>
        </a>
      </div>
    </div>

    <div class="parte-media">
        <h2 class="m-2">Estudiante a Editar</h2>
      <div class="menuTabla contenedor2">
      <form class="col d-flex flex-wrap" action=""  method="post">
              <div class="mb-1 col-12">
                <label for="nombres" class="form-label">Nombres</label>
                <input 
                  type="text"
                  id="nombres"
                  name="nombres"
                  class="form-control"
                  value="<?php echo $val["NOMBRES"];?>"  
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="direccion" class="form-label">Direccion</label>
                <input 
                  type="text"
                  id="direccion"
                  name="direccion"
                  class="form-control"  
                  value="<?php echo $val["dirrecion"];?>"
                 
                />
              </div>

              <div class="mb-1 col-12">
                <label for="logros" class="form-label">Logros</label>
                <input 
                  type="text"
                  id="logros"
                  name="logros"
                  class="form-control"
                  value="<?php echo $val["logros"];?>"  
                  
                  
                />
              </div>
              <div class="mb-1 col-12">
                <label for="logros" class="form-label">Skills</label>
                <input 
                type="text"
                step="0.01"
                id="skills"
                name="skills"
                class="form-control"
                value="<?php echo $val["skills"];?>" 
                >
              </div>
              <div class="mb-1 col-12">
                <label for="logros" class="form-label">Ingles</label>
                <select name="ingles"  class="form-control" id="ingles" value="<?php echo $val["ingles"];?>">
                  <option value="">Selecione Nivel de Ingles</option>
                  <option value="Beginner">Beginner</option>
                  <option value="Middle">Middle</option>
                  <option value="Advanced">Advanced</option>     
                </select>
              </div>
              <div class="mb-1 col-12">
                <label for="logros" class="form-label">Ser</label>
                <input 
                type="text"
                step="0.01"
                id="ser"
                name="ser"
                class="form-control"
                value="<?php echo $val["ser"];?>"  
                >
              </div>
              <div class="mb-1 col-12">
                <label for="logros" class="form-label">Rewiew</label>
                <input 
                type="text"
                step="0.01"
                id="rewiew"
                name="rewiew"
                class="form-control"
                value="<?php echo $val["rewiew"];?>"  
                >
              </div>
              <div class="mb-1 col-12">
                <label for="logros" class="form-label">Especialidad</label>
                <select name="especialidad"  class="form-control" id="especialidad" value="<?php echo $val["especialidad"];?>">
                  <option value="">Selecione Especialidad</option>
                  <option value="FullStack">FullStack</option>
                  <option value="FrontEnd">FrontEnd</option>
                  <option value="BackEnd">BackEnd</option>     
                </select>
              </div>

              <div class=" col-12 m-2">
                <input type="submit" class="btn btn-primary" value="UPDATE" name="editar"/>
              </div>
            </form>  
        <div id="charts1" class="charts"> </div>
      </div>
    </div>

    <div class="parte-derecho " id="detalles">
      <h3>Detalle Estudiantes</h3>
      <p>Cargando...</p>
       <!-- ///////Generando la grafica -->

    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>




</body>

</html>