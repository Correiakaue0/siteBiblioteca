<?php

namespace Alura\Cursos\Entity;

use Alura\Cursos\Entity\Livros;

/**
* @Entity
* @Table(name="arquivo")
*/
class Arquivos
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer", nullable=true)
     */
    private $id_arquivo;
    /**
     * @ORM\ManyToOne ManyToOne(targetEntity="Livro", mappedBy="Titulo")
     * @Column(type="string", nullable=true)
     */
    private $titulo_livro;
    /**
     * @ORM\ManyToOne ManyToOne(targetEntity="Livro", mappedBy="id")
     * @Column(type="string", nullable=true)
     */
    private $idLivro;
    /**
     * @var mixed
     * @Column(type="string", nullable=true)
     */
    private $path;

    /**
     * @return mixed
     */
    public function getIdLivro()
    {
        return $this->idLivro;
    }

    /**
     * @param mixed $idLivro
     */
    public function setIdLivro($idLivro): void
    {
        $this->idLivro = $idLivro;
    }

    /**
     * @param mixed $id_arquivo
     */
    public function setIdArquivo($id_arquivo): void
    {
        $this->id_arquivo = $id_arquivo;
    }

    public function getIdArquivos()
    {
        return $this->id_arquivos;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $titulo_livro
     */
    public function setTituloLivro($titulo_livro): void
    {
        $this->titulo_livro = $titulo_livro;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path) : void
    {
        $this->path = $path;
    }

}