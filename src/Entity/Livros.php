<?php

namespace Alura\Cursos\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="Livro")
 */
class Livros
{
    /**
     * @ID
     * @GeneratedValue
     * @ORM\ManyToOne(targetEntity="Capas" , inversedBy="id_capa")
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
     * @Column(type="string", nullable=true)
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

    /**
     * @return mixed
     */
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

    public function setId(int $id): void
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

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->Titulo;
    }

    /**
     * @param mixed $Titulo
     */
    public function setTitulo($Titulo): void
    {
        $this->Titulo = $Titulo;
    }

    /**
     * @return mixed
     */
    public function getImagem()
    {
        return $this->Imagem;
    }

    /**
     * @param mixed $Imagem
     */
    public function setImagem($Imagem): void
    {
        $this->Imagem = $Imagem;
    }

}
