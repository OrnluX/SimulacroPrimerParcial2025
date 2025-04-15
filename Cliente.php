<?php
class Cliente
{
    private string $nombre;
    private string $apellido;
    private string $tipoDocumento;
    private  int $nroDocumento;
    private bool $estado;

    public function __construct(string $nombre, string $apellido, string $tipoDocumento, int $nroDocumento, bool $estado)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDocumento = $tipoDocumento;
        $this->nroDocumento = $nroDocumento;
        $this->estado = $estado;
    }

    //GETTERS
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getApellido(): string
    {
        return $this->apellido;
    }
    public function getTipoDocumento(): string
    {
        return $this->tipoDocumento;
    }
    public function getNroDocumento(): int
    {
        return $this->nroDocumento;
    }
    public function getEstado(): bool
    {
        return $this->estado;
    }

    //SETTERS
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setApellido(string $apellido): void
    {
        $this->apellido = $apellido;
    }
    public function setTipoDocumento(string $tipoDocumento): void
    {
        $this->tipoDocumento = $tipoDocumento;
    }
    public function setNroDocumento(int $nroDocumento): void
    {
        $this->nroDocumento = $nroDocumento;
    }
    public function setEstado(bool $estado): void
    {
        $this->estado = $estado;
    }

    //TOSTRING
    public function __toString(): string
    {
        return "Nombre: " . $this->getNombre() . "\n" .
            "Apellido: " . $this->getApellido() . "\n" .
            "Tipo de Documento: " . $this->getTipoDocumento() . "\n" .
            "Numero de Documento: " . $this->getNroDocumento() . "\n" .
            "Estado: " . ($this->getEstado() ? "Activo" : "Inactivo") . "\n" .
            "----------------------------------------\n";
    }
}
