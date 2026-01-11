
<?php
// api/index.php

// 1) Leer variables de entorno (definidas en Vercel)
$host = getenv('MYSQL_HOST');
$user = getenv('MYSQL_USER');
$pass = getenv('MYSQL_PASSWORD');
$db   = 'SG';

// 2) Conexión MySQL
$conexion = @mysqli_connect($host, $user, $pass, $db);
if (!$conexion) {
  http_response_code(500);
  $error = mysqli_connect_error();
} else {
  mysqli_set_charset($conexion, 'utf8mb4');

  // 3) Consulta
  $cadenaSQL = "SELECT name, credit_rating, address, city, state, country, zip_code FROM s_customer";
  $resultado = mysqli_query($conexion, $cadenaSQL);

  if (!$resultado) {
    http_response_code(500);
    $error = mysqli_error($conexion);
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Customer Catalog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigins="lead">Customer Catalog Sample Application</p>
      <hr class="my-4">
      <p>PHP sample application connected to a MySQL database to list a customer catalog</p>
    </div>

    <?php if (isset($error)): ?>
      <div class="alert alert-danger">
        <strong>Error:</strong> <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
      </div>
      <p class="text-muted">
        Revisa que <code>MYSQL_HOST</code>, <code>MYSQL_USER</code> y <code>MYSQL_PASSWORD</code> estén bien en Vercel,
        y que la instancia MySQL permita conexiones desde fuera.
      </p>
    <?php else: ?>
      <table class="table table-striped table-responsive">
        <thead>
          <tr>
            <th>Name</th>
            <th>Credit Rating</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Zip</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($fila = mysqli_fetch_object($resultado)): ?>
            <tr>
              <td><?php echo htmlspecialchars($fila->name ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php echo htmlspecialchars($fila->credit_rating ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php echo htmlspecialchars($fila->address ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php echo htmlspecialchars($fila->city ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php echo htmlspecialchars($fila->state ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php echo htmlspecialchars($fila->country ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
              <td><?php echo htmlspecialchars($fila->zip_code ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php endif; ?>

  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
          integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWP     integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQli_close($conexion);
}
?>
