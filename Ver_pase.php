<?php
$u = $_POST["usuario"] ?? "";
echo '<link rel="stylesheet" href="estilo.css">';
if ($u != "admin") die("<div class='error'>Acceso denegado: solo el administrador.</div>");

$id = (int) $_POST["id"];
$lineas = file("reservas.txt", FILE_IGNORE_NEW_LINES);
if (!isset($lineas[$id - 1])) die("<div class='error'>No existe la reserva.</div>");
$d = array_map("htmlspecialchars", explode("|", $lineas[$id - 1]));
?>
<h2 style="text-align:center">Acreditación #<?= $id ?> (Vista Administrador)</h2>
<div class="pase">
    <img src="<?= $d[8] ?>">
    <h3><?= $d[1] ?></h3>
    <p><b>Email:</b> <?= $d[2] ?></p>
    <p><b>Edad:</b> <?= $d[3] ?> años</p>
    <p><b>Tipo de Entrada:</b> <?= $d[4] ?></p>
    <p><b>Días de asistencia:</b> <?= $d[5] ?></p>
    <p><b>Método de pago:</b> <?= $d[6] ?></p>
    <p><i>"<?= $d[9] ?>"</i></p>
    <h3>Total: <?= $d[7] ?></h3>
</div>
<br>
<form action="ver_reservas.php" method="post" style="text-align:center">
    <input type="hidden" name="usuario" value="<?= htmlspecialchars($u) ?>">
    <button>← Volver al listado de reservas</button>
</form>