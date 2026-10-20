<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") { header("Location: login.php"); exit; }
echo '<link rel="stylesheet" href="estilo.css">';

if ($_POST["edad"] < 18) die("<div class='error'>Tienes que ser mayor de 18 años.</div>");

$foto = "uploads/" . uniqid("user_") . "." . pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);

$precios = ["General" => 50, "VIP" => 80, "Super VIP" => 160];
$dias = $_POST["dias"] ?? [];
$total = $precios[$_POST["pase"]] + 30 * count($dias);

$q = ["|", "\r", "\n"];
$linea = implode("|", [date("Y-m-d H:i:s"), str_replace($q, " ", $_POST["nombre"]), str_replace($q, " ", $_POST["email"]),
    $_POST["edad"], $_POST["pase"], implode(", ", $dias), $_POST["pago"], $total . "€", $foto,
    str_replace($q, " ", $_POST["comentarios"])]) . "\n";
file_put_contents("reservas.txt", $linea, FILE_APPEND);
?>
<h2>Reserva guardada. Total: <?= $total ?>€</h2>
<form action="ver_reservas.php" method="post">
    <input type="hidden" name="usuario" value="<?= htmlspecialchars($_POST["usuario"]) ?>">
    <button>Ver reservas</button>
</form>