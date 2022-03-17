<?php

namespace Alura\Cursos\Entity;
/**
 * @Entity
 * @Table(name="capas")
 */
class Capas
{
    /**
     * @id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id_capa;
    /**
     *
     * @Column(type="string" , nullable=true)
     */
    private $capa;
    /**
     * @Column(type="string", nullable=true)
     */
    private $contraCapa;
    /**
     * @ManyToOne(targetEntity="Livros", inversedBy="Imagem", cascade={"remove", "persist"})
     */
    private $livro;

    /**
     * @param mixed $livro
     */
    public function setLivro(Livros $livro): self
    {
        $this->livro = $livro;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCapa()
    {
        return $this->capa;
    }

    /**
     * @return mixed
     */
    public function getContraCapa()
    {
        return $this->contraCapa;
    }

    /**
     * @return mixed
     */
    public function getIdCapa()
    {
        return $this->id_capa;
    }

    /**
     * @param mixed $capa
     */
    public function setCapa($capa): void
    {
        $this->capa = $capa;
    }

    /**
     * @param mixed $contraCapa
     */
    public function setContraCapa($contraCapa): void
    {
        $this->contraCapa = $contraCapa;
    }

    /**
     * @param mixed $id_capa
     */
    public function setIdCapa($id_capa): void
    {
        $this->id_capa = $id_capa;
    }

}