<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Entrenador
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 100)]
    private ?string $apellido = null;

    #[ORM\Column(length: 100)]
    private ?string $especialidad = null;

    #[ORM\Column(length: 150)]
    private ?string $email = null;

    #[ORM\Column(length: 20)]
    private ?string $telefono = null;

    #[ORM\OneToMany(mappedBy: 'entrenador', targetEntity: Clase::class)]
    private Collection $clases;

    public function __construct()
    {
        $this->clases = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }
    public function getNombre(): ?string { return $this->nombre; }
    public function setNombre(string $nombre): self { $this->nombre = $nombre; return $this; }

    public function getApellido(): ?string { return $this->apellido; }
    public function setApellido(string $apellido): self { $this->apellido = $apellido; return $this; }

    public function getEspecialidad(): ?string { return $this->especialidad; }
    public function setEspecialidad(string $especialidad): self { $this->especialidad = $especialidad; return $this; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): self { $this->email = $email; return $this; }

    public function getTelefono(): ?string { return $this->telefono; }
    public function setTelefono(string $telefono): self { $this->telefono = $telefono; return $this; }


}
