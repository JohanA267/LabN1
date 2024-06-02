<?php
require 'html/header.html';
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $cuota = $_POST['cuota'];
    $cuota_capital = $_POST['cuota_capital'];
    $fecha_pago = $_POST['fecha_pago'];

    insertPagos($nombre, $cuota, $cuota_capital, $fecha_pago);
}
?>

<form action="index.php" method="post">
    <label for="nombre">Nombre</label>
    <div class="input-group">
        <input type="text" name="nombre" id="nombre" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
    </div>
    <label for="cuota" class="margenes">Cuota</label>
    <div class="input-group">
        <input type="number" name="cuota" id="cuota" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
        <span class="input-group-text">$</span>
    </div>
    <label for="cuota_capital" class="margenes">Cuota de Capital</label>
    <div class="input-group">
        <input type="number" name="cuota_capital" id="cuota_capital" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
        <span class="input-group-text">$</span>
    </div>
    <label for="fecha_pago" class="margenes">Fecha de Pago</label>
    <div class="input-group">
        <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
    </div>
    <button type="submit" class="btn btn-primary margenes">Agregar</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cuota</th>
            <th scope="col">Cuota de Capital</th>
            <th scope="col">Fecha de Pago</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $pagos = getPagos();

        foreach ($pagos as $pago) { ?>
            <tr>
                <th scope="row"><?= $pago->id ?></th>
                <td><?= $pago->deudor ?></td>
                <td><?= $pago->cuota ?></td>
                <td><?= $pago->cuota_capital ?></td>
                <td><?= $pago->fecha_pago ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
require 'html/footer.html';
?>