<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Entrenador; // o Socio si tu entidad de entrenador se llama así

#[ORM\Entity]
class Clase
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column(type:"integer")]
    private ?int $id = null;

    #[ORM\Column(type:"string", length:100)]
    private ?string $nombre = null;

    #[ORM\Column(type:"string", length:50)]
    private ?string $tipo = null;

    #[ORM\Column(type:"time")]
    private ?\DateTimeInterface $hora = null;

    #[ORM\ManyToOne(targetEntity: Entrenador::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Entrenador $entrenador = null;

    // --- Getters y setters ---
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function getHora(): ?\DateTimeInterface
    {
        return $this->hora;
    }

    public function setHora(\DateTimeInterface $hora): self
    {
        $this->hora = $hora;
        return $this;
    }

    public function getEntrenador(): ?Entrenador
    {
        return $this->entrenador;
    }

    public function setEntrenador(?Entrenador $entrenador): self
    {
        $this->entrenador = $entrenador;
        return $this;
    }

    // src/Entity/Clase.php
    public function __toString(): string
    {
        return $this->getNombre();
    }

}
