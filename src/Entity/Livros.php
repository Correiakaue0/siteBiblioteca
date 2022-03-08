<?php

namespace Alura\Cursos\Entity;

/**
 * @Entity
 * @Table(name="Livro")
 */
class Livros
{
    /**
     * @Id
     * @GeneratedValue
     * @ORM\ManyToOne(targetEntity="id", inversedBy="Arquivos")
     * @Column(type="integer")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Titulo", inversedBy="Arquivos")
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
