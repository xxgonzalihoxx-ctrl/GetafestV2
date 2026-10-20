<?php
$u = $_POST["usuario"] ?? "";
if ($u == "") { header("Location: login.php"); exit; }
$lineas = file_exists("reservas.txt") ? file("reservas.txt", FILE_IGNORE_NEW_LINES) : [];
?>
<link rel="stylesheet" href="estilo.css">
<h1>DEVMUSIC FEST 2026</h1>
<h2>Listado de Reservas</h2>
<form action="index.php" method="post">
    <input type="hidden" name="usuario" value="<?= htmlspecialchars($u) ?>">
    <button>+ Nueva Reserva</button>
</form>
<br>
<table>
    <tr><th>ID</th><th>Fecha</th><th>Nombre</th><th>Email</th><th>Edad</th><th>Pase</th><th>Pago</th><th>Total</th><th>Acción</th></tr>
    <?php foreach ($lineas as $i => $linea) {
        $d = array_map("htmlspecialchars", explode("|", $linea)); ?>
        <tr>
            <td><?= $i + 1 ?></td>
            <td><?= $d[0] ?></td><td><?= $d[1] ?></td><td><?= $d[2] ?></td><td><?= $d[3] ?></td>
            <td><?= $d[4] ?></td><td><?= $d[6] ?></td><td><?= $d[7] ?></td>
            <td>
                <form action="ver_pase.php" method="post">
                    <input type="hidden" name="usuario" value="<?= htmlspecialchars($u) ?>">
                    <input type="hidden" name="id" value="<?= $i + 1 ?>">
                    <button>Ver Pase</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>