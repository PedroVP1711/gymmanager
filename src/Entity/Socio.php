<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Socio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 100)]
    private ?string $apellido = null;

    #[ORM\Column(length: 150)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $edad = null;

    #[ORM\Column(length: 20)]
    private ?string $telefono = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $fechaAlta = null;

    #[ORM\Column(length: 50)]
    private ?string $tipoMembresia = null;

    #[ORM\OneToMany(mappedBy: 'socio', targetEntity: Inscripcion::class, cascade: ['remove'])]
    private Collection $inscripciones;

    public function __construct()
    {
        $this->inscripciones = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getNombre(): ?string { return $this->nombre; }
    public function setNombre(string $nombre): self { $this->nombre = $nombre; return $this; }

    public function getApellido(): ?string { return $this->apellido; }
    public function setApellido(string $apellido): self { $this->apellido = $apellido; return $this; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): self { $this->email = $email; return $this; }

    public function getEdad(): ?int { return $this->edad; }
    public function setEdad(int $edad): self { $this->edad = $edad; return $this; }

    public function getTelefono(): ?string { return $this->telefono; }
    public function setTelefono(string $telefono): self { $this->telefono = $telefono; return $this; }

    public function getFechaAlta(): ?\DateTimeInterface { return $this->fechaAlta; }
    public function setFechaAlta(\DateTimeInterface $fechaAlta): self { $this->fechaAlta = $fechaAlta; return $this; }

    public function getTipoMembresia(): ?string { return $this->tipoMembresia; }
    public function setTipoMembresia(string $tipoMembresia): self { $this->tipoMembresia = $tipoMembresia; return $this; }

    // src/Entity/Socio.php
    public function __toString(): string
    {
        return $this->getNombre() . ' ' . $this->getApellido();
    }

}
