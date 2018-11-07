<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ItemHistoricoClasificacionRepository")
 */
class ItemHistoricoClasificacion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Fecha_Desde;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Fecha_Hasta;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $Hora_Desde;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $Hora_Hasta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Observacion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ClasificacionTicket")
     */
    private $Clasificacion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ticket", inversedBy="HistorialClasificaciones")
     */
    private $Ticket;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getFechaDesde(): ?\DateTimeInterface
    {
        return $this->Fecha_Desde;
    }

    public function setFechaDesde(?\DateTimeInterface $Fecha_Desde): self
    {
        $this->Fecha_Desde = $Fecha_Desde;

        return $this;
    }

    public function getFechaHasta(): ?\DateTimeInterface
    {
        return $this->Fecha_Hasta;
    }

    public function setFechaHasta(?\DateTimeInterface $Fecha_Hasta): self
    {
        $this->Fecha_Hasta = $Fecha_Hasta;

        return $this;
    }

    public function getHoraDesde(): ?\DateTimeInterface
    {
        return $this->Hora_Desde;
    }

    public function setHoraDesde(?\DateTimeInterface $Hora_Desde): self
    {
        $this->Hora_Desde = $Hora_Desde;

        return $this;
    }

    public function getHoraHasta(): ?\DateTimeInterface
    {
        return $this->Hora_Hasta;
    }

    public function setHoraHasta(?\DateTimeInterface $Hora_Hasta): self
    {
        $this->Hora_Hasta = $Hora_Hasta;

        return $this;
    }

    public function getObservacion(): ?string
    {
        return $this->Observacion;
    }

    public function setObservacion(?string $Observacion): self
    {
        $this->Observacion = $Observacion;

        return $this;
    }

    public function getClasificacion(): ?ClasificacionTicket
    {
        return $this->Clasificacion;
    }

    public function setClasificacion(?ClasificacionTicket $Clasificacion): self
    {
        $this->Clasificacion = $Clasificacion;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getTicket(): ?Ticket
    {
        return $this->Ticket;
    }

    public function setTicket(?Ticket $Ticket): self
    {
        $this->Ticket = $Ticket;

        return $this;
    }
    public function __construct()
    {
        $this->Fecha_Desde= new DateTime();
        $this->Hora_Desde=null;
    }
}
