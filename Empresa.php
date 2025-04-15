<?php
class Empresa
{
    private string $denominacion;
    private string $direccion;
    private array $clientes;
    private array $motos;
    private array $ventas;

    public function __construct(string $denominacion, string $direccion, array $clientes, array $motos, array $ventas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->clientes = $clientes;
        $this->motos = $motos;
        $this->ventas = $ventas;
    }

    //GETTERS
    public function getDenominacion(): string
    {
        return $this->denominacion;
    }
    public function getDireccion(): string
    {
        return $this->direccion;
    }
    public function getClientes(): array
    {
        return $this->clientes;
    }
    public function getMotos(): array
    {
        return $this->motos;
    }
    public function getVentas(): array
    {
        return $this->ventas;
    }

    //SETTERS
    public function setDenominacion(string $denominacion): void
    {
        $this->denominacion = $denominacion;
    }
    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }
    public function setClientes(array $clientes): void
    {
        $this->clientes = $clientes;
    }
    public function setMotos(array $motos): void
    {
        $this->motos = $motos;
    }
    public function setVentas(array $ventas): void
    {
        $this->ventas = $ventas;
    }

    //METODOS
    public function retornarMoto(int $codigoMoto): ?Moto
    {
        $i = 0;
        $encontrado = false;
        $moto = null;
        while ($i < count($this->getMotos()) && !$encontrado) {
            if ($this->getMotos()[$i]->getCodigo() == $codigoMoto) {
                $this->getMotos()[$i] = $moto;
                $encontrado = true;
                $moto = $this->getMotos()[$i];
            }
            $i++;
        }

        return $moto;
    }

    public function registrarVenta(array $colCodigosMoto, Cliente $objCliente): float
    {
        $ventas = [];
        $coleccionMotosActivas = [];
        $precioFinal = -1;
        // VALIDAR PRIMERO SI LA MOTO EN LA COLECCION DE MOTOS ESTA ACTIVA Y ADEMAS SI EL CODIGO DE MOTO EXISTE 
        for ($i = 0; $i < count($colCodigosMoto); $i++) {
            if ($this->retornarMoto($colCodigosMoto[$i]) != null && $this->retornarMoto($colCodigosMoto[$i])->getEstado()) {

                $coleccionMotosActivas[] = $this->retornarMoto($colCodigosMoto[$i]);
            }
        }

        if ($objCliente->getEstado() && count($coleccionMotosActivas) > 0) {
            $nroVentaAleatorio = rand(1, 1000);
            $venta = new Venta($nroVentaAleatorio, new DateTime(), $objCliente);
            foreach ($coleccionMotosActivas as $moto) {
                $venta->incorporarMoto($this->retornarMoto($moto->getCodigo()));
            }

            $precioFinal = $venta->getPrecioFinal();
            $ventas[] = $venta;
            $this->setVentas($ventas);
        }

        return $precioFinal;
    }

    public function retornarVentasXCliente(string $tipoDocumento, int $nroDocumento)
    {
        $ventasCliente = [];
        for ($i = 0; $i < count($this->getVentas()); $i++) {
            if ($this->getVentas()[$i]->getObjCliente()->getTipoDocumento() == $tipoDocumento && $this->getVentas()[$i]->getObjCliente()->getNroDocumento() == $nroDocumento) {
                $ventasCliente[] = $this->getVentas()[$i];
            }
        }

        return $ventasCliente;
    }

    //TOSTRING
    public function __toString(): string
    {
        return "Empresa: " . $this->getDenominacion() . "\n" .
            "Direccion: " . $this->getDireccion() . "\n" .
            "----------------------------------------\n" .
            "----------------------------------------\n" .
            "Clientes: " . "\n" . "\n" .
            implode("-", $this->getClientes()) . "\n" .
            "----------------------------------------\n" .
            "----------------------------------------\n" .
            "Motos de la empresa: " . "\n" . "\n" .
            implode("-", $this->getMotos()) . "\n" .
            "----------------------------------------\n" .
            "----------------------------------------\n" .
            "Ventas: " . "\n" . "\n" .
            implode("-", $this->getVentas()) . "\n";
    }
}
