<?php
class Venta
{
    private int $numero;
    private DateTime $fecha;
    private Cliente $objCliente;
    private array $arrMotos = [];
    private float $precioFinal = 0.0;

    public function __construct(int $numero, DateTime $fecha, Cliente $objCliente)
    {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $objCliente;
    }

    //GETTERS
    public function getNumero(): int
    {
        return $this->numero;
    }
    public function getFecha(): DateTime
    {
        return $this->fecha;
    }
    public function getObjCliente(): Cliente
    {
        return $this->objCliente;
    }
    public function getArrMotos(): array
    {
        return $this->arrMotos;
    }
    public function getPrecioFinal(): float
    {
        return $this->precioFinal;
    }

    //SETTERS
    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }
    public function setFecha(DateTime $fecha): void
    {
        $this->fecha = $fecha;
    }
    public function setObjCliente(Cliente $objCliente): void
    {
        $this->objCliente = $objCliente;
    }
    public function setArrMotos(array $arrMotos): void
    {
        $this->arrMotos = $arrMotos;
    }
    public function setPrecioFinal(float $precioFinal): void
    {
        $this->precioFinal = $precioFinal;
    }

    //METODOS
    public function incorporarMoto(Moto $objMoto): void
    {
        $precioVenta = $objMoto->darPrecioVenta();
        if ($precioVenta > 0) {
            $arregloMotos = $this->getArrMotos();
            $arregloMotos[] = $objMoto;
            $this->setArrMotos($arregloMotos);

            $this->setPrecioFinal($this->getPrecioFinal() + $precioVenta);
        }
    }

    //TOSTRING
    public function __toString(): string
    {
        return
            "Numero: " . $this->getNumero() . "\n" .
            "Fecha: " . $this->getFecha()->format("d/m/Y") . "\n" .
            "Cliente: " . $this->getObjCliente() . "\n" .
            "Precio Final: " . $this->getPrecioFinal() . "\n" .
            "----------------------------------------\n" .
            "Motos: " . implode(" -  ", $this->getArrMotos()) . "\n";
    }
}
