<?php

namespace Alura\Cursos\Entity;


use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="Livro")
 */
class Livros
{
    /**
     * @ID
     * @GeneratedValue
     * @Column(type="integer" , nullable=true)
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $Titulo;

    /**
     * @Column(type="string")
     */
    private $descricao;

    /**
     * @OneToMany(targetEntity="Capas", mappedBy="livro", cascade={"remove", "persist"})
     */
    private $Imagem;
    /**
     * @Column(type="string")
     */
    private $autor;
    /**
     * @Column(type="string")
     */
    private $genero;

    public function __construct()
    {
        $this->Imagem = new ArrayCollection();
    }

    public function addImagem(Capas $capa): Livros
    {
        $this->Imagem->add($capa);
        $capa->setCapa($this);
        return $this;
        
    }

    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     */
    public function setGenero($genero): void
    {
        $this->genero = $genero;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor): void
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getAutor() : string
    {
        return $this->autor;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): void
    {
        $this->descricao = $descricao;
    }
    public function getTitulo()
    {
        return $this->Titulo;
    }

    public function setTitulo($Titulo): void
    {
        $this->Titulo = $Titulo;
    }
    public function getImagem(): ArrayCollection
    {
        return $this->Imagem;
    }


}
