<?php
$error = "";
if (isset($_POST["entrar"])) {
    if (!file_exists("usuario.txt")) {
        $error = "Error: No existe el archivo usuario.txt";
    } elseif (in_array($_POST["usuario"] . ":" . $_POST["clave"], file("usuario.txt", FILE_IGNORE_NEW_LINES))) {
        echo '<form name="f" action="index.php" method="post">
              <input type="hidden" name="usuario" value="' . htmlspecialchars($_POST["usuario"]) . '"></form>
              <script>document.f.submit()</script>';
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<link rel="stylesheet" href="estilo.css">
<h1>DEVMUSIC FEST 2026</h1>
<h2>Iniciar Sesión</h2>
<?php if ($error) echo "<div class='error'>$error</div>"; ?>
<form method="post">
    Usuario: <input type="text" name="usuario">
    Contraseña: <input type="password" name="clave">
    <button name="entrar">Entrar al Sistema</button>
</form>