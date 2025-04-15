<?php
include_once "Cliente.php";
include_once "Moto.php";
include_once "Venta.php";
include_once "Empresa.php";


$objCliente1 = new Cliente("Juan", "Pérez", "DNI", 12345678, true);
$objCliente2 = new Cliente("Ana", "Gómez", "DNI", 87654321, true);

$objMoto1 = new Moto(11, 2230000, 2025, "Benelli Imperiale 400", 85, true);
$objMoto2 = new Moto(12, 584000, 2021, "Zanella Zr 150 Ohc", 70, true);
$objMoto3 = new Moto(13, 999900, 2023, "Zanella Patagonian Eagle 250", 55, false);

$empresa = new Empresa("Alta gama", "Av. Argentina 123", [$objCliente1, $objCliente2], [$objMoto1, $objMoto2, $objMoto3], []);

$empresa->registrarVenta([11, 12, 13], $objCliente1);
$empresa->registrarVenta([0], $objCliente2);
$empresa->registrarVenta([2], $objCliente2);

echo implode("-", $empresa->retornarVentasXCliente("DNI", 12345678));
echo implode("-", $empresa->retornarVentasXCliente("DNI", 87654321));

// echo $empresa;
