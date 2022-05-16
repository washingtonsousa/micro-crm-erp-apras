<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagem
 *
 * @ORM\Table(name="imagem")
 * @ORM\Entity
 */
class Imagem
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_imagem", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idImagem;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="text", length=65535, nullable=true)
     */
    public $url;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    public $nome;

    /**
     * @var string|null
     *
     * @ORM\Column(name="absolut_path", type="text", length=65535, nullable=true)
     */
    public $absolutPath;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="web", type="boolean", nullable=true)
     */
    public $web = '0';


       /**
    * 
    * @ORM\OneToMany(targetEntity="ClienteImagem", mappedBy="imagem", cascade={"all"})
    */
    public $clienteImagens;


    /**
     * Set the value of absolutPath
     *
     * @param  string|null  $absolutPath
     *
     * @return  self
     */ 
    public function setAbsolutPath($absolutPath)
    {
        $this->absolutPath = $absolutPath;

        return $this;
    }

    /**
     * Set the value of nome
     *
     * @param  string  $nome
     *
     * @return  self
     */ 
    public function setNome(string $nome)
    {
        $this->nome = $nome;

        return $this;
    }


    

    /**
     * Get the value of absolutPath
     *
     * @return  string|null
     */ 
    public function getAbsolutPath()
    {
        return $this->absolutPath;
    }

    /**
     * Get the value of nome
     *
     * @return  string
     */ 
    public function getNome()
    {
        return $this->nome;
    }
}
