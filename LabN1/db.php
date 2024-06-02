<?php

function getPagos()
{
    $db = new PDO(
        'mysql:host=localhost;'
            . 'dbname=db_labn1;charset=utf8',
        'root',
        '1234'
    );

    $sentencia = $db->prepare("select * from pagos");
    $sentencia->execute();
    $pagos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $pagos;
}

function insertPagos($nombre, $cuota, $cuota_capital, $fecha_pago)
{
    $db = new PDO(
        'mysql:host=localhost;'
            . 'dbname=db_labn1;charset=utf8',
        'root',
        '1234'
    );

    $sentencia = $db->prepare("insert into pagos(deudor, cuota, cuota_capital, fecha_pago) values(?, ? , ? , ?)");
    $sentencia->execute([$nombre, $cuota, $cuota_capital, $fecha_pago]);

    return $db->lastInsertId();
}
