<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Socio;
use App\Entity\Clase;

#[ORM\Entity(repositoryClass: "App\Repository\InscripcionRepository")]
class Inscripcion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type:"integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Socio::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Socio $socio;

    #[ORM\ManyToOne(targetEntity: Clase::class)]
    #[ORM\JoinColumn(nullable: false)]
    private Clase $clase;

    #[ORM\Column(type:"datetime")]
    private \DateTimeInterface $fecha;

    // getters y setters
    public function getId(): ?int { return $this->id; }
    public function getSocio(): Socio { return $this->socio; }
    public function setSocio(Socio $socio): self { $this->socio = $socio; return $this; }
    public function getClase(): Clase { return $this->clase; }
    public function setClase(Clase $clase): self { $this->clase = $clase; return $this; }
    public function getFecha(): \DateTimeInterface { return $this->fecha; }
    public function setFecha(\DateTimeInterface $fecha): self { $this->fecha = $fecha; return $this; }
}
