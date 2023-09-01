<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <title>Usuarios</title>
</head>

<body>
  <div class="nav">
    <a href="index.html">Acerca de mí</a>
    <a href="formulario.html">Contacto</a>
    <a href="usuarios.php">Usuarios</a>
  </div>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="title-contact mt-2">
          <h1>Agregar usuarios</h1>
        </div>
        <div class="form">
          <form action="store.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="input" required />
            <label for="correo">Correo electrónico</label>
            <input type="email" name="correo" id="correo" class="input" required />
            <button type="submit" class="btn btn-primary w-100">Enviar</button>
          </form>
        </div>
      </div>
      <div class="col">
        <div class="title-contact mt-2">
          <h1 class="mb-5">Mostrar usuarios</h1>
        </div>
        <?php
        require('conexion.php');
        $sql = "SELECT * FROM usuarios";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        echo "<ul>";
        foreach ($stmt->fetchAll() as $row) {
          echo "<li>" . $row['id'] . " - " . $row['nombre'] . " - " . $row['correo'];
        }
        echo "</ul>";
        ?>
      </div>
    </div>
  </div>
</body>

</html>