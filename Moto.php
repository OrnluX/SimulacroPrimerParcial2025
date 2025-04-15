<?php
class Moto
{
    private int $codigo;
    private int $costo;
    private int $anioFabricacion;
    private string $descripcion;
    private int $porcentajeIncrementoAnual;
    private bool $estado;

    public function __construct(int $codigo, int $costo, int $anioFabricacion, string $descripcion, int $porcentajeIncrementoAnual, bool $estado)
    {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->estado = $estado;
    }

    //GETTERS
    public function getCodigo(): int
    {
        return $this->codigo;
    }
    public function getCosto(): int
    {
        return $this->costo;
    }
    public function getAnioFabricacion(): int
    {
        return $this->anioFabricacion;
    }
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
    public function getPorcentajeIncrementoAnual(): int
    {
        return $this->porcentajeIncrementoAnual;
    }
    public function getEstado(): bool
    {
        return $this->estado;
    }

    //SETTERS
    public function setCodigo(int $codigo): void
    {
        $this->codigo = $codigo;
    }
    public function setCosto(int $costo): void
    {
        $this->costo = $costo;
    }
    public function setAnioFabricacion(int $anioFabricacion): void
    {
        $this->anioFabricacion = $anioFabricacion;
    }
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }
    public function setPorcentajeIncrementoAnual(int $porcentajeIncrementoAnual): void
    {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }
    public function setEstado(bool $estado): void
    {
        $this->estado = $estado;
    }

    //METODOS
    public function darPrecioVenta(): float
    {
        $precioVenta = -1;
        if ($this->getEstado()) {
            $anioActual = date("Y");
            $diferenciaAnos = $anioActual - $this->getAnioFabricacion();
            $incremento = (($this->getCosto() * $this->getPorcentajeIncrementoAnual()) / 100) * $diferenciaAnos;
            $precioVenta = $this->getCosto() + $incremento;
        }
        return $precioVenta;
    }

    //TOSTRING
    public function __toString(): string
    {
        return "\n" . "Codigo:" . $this->getCodigo() . "\n" .
            "Costo:" . $this->getCosto() . "\n" .
            "Anio de Fabricacion:" . $this->getAnioFabricacion() . "\n" .
            "Descripcion:" . $this->getDescripcion() . "\n" .
            "Porcentaje de Incremento Anual:" . $this->getPorcentajeIncrementoAnual() . "\n" .
            "Estado:" . ($this->getEstado() ? "Activo" : "Inactivo") . "\n" .
            "----------------------------------------\n";
    }
}
