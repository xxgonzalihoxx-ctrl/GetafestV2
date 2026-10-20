<?php
$u = $_POST["usuario"] ?? "";
if ($u == "") { header("Location: login.php"); exit; }
?>
<link rel="stylesheet" href="estilo.css">
<h1>DEVMUSIC FEST 2026</h1>
<p>Usuario activo: <b><?= htmlspecialchars($u) ?></b> <a href="login.php">Cerrar sesión</a></p>

<form action="ver_reservas.php" method="post">
    <input type="hidden" name="usuario" value="<?= htmlspecialchars($u) ?>">
    <button>Ver reservas</button>
</form>

<h2>Reserva de pases</h2>
<form action="procesar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="usuario" value="<?= htmlspecialchars($u) ?>">
    Nombre: <input type="text" name="nombre" required>
    Email: <input type="email" name="email" required>
    Edad: <input type="number" name="edad" required>
    Pase:
    <select name="pase">
        <option>General</option>
        <option>VIP</option>
        <option>Super VIP</option>
    </select>
    Días:
    <input type="checkbox" name="dias[]" value="Viernes"> Viernes
    <input type="checkbox" name="dias[]" value="Sábado"> Sábado
    <input type="checkbox" name="dias[]" value="Domingo"> Domingo
    <br><br>
    Pago:
    <select name="pago">
        <option>Bizum</option>
        <option>PayPal</option>
        <option>Tarjeta</option>
    </select>
    Foto: <input type="file" name="foto" required>
    Comentarios: <textarea name="comentarios"></textarea>
    <button>Reservar</button>
</form>