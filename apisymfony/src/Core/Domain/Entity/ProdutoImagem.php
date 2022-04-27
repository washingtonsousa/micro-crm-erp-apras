<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoImagem
 *
 * @ORM\Table(name="produto_imagem", indexes={@ORM\Index(name="fk_produto_imagem_imagem1_idx", columns={"id_imagem"}), @ORM\Index(name="fk_produto_imagem_produto1_idx", columns={"idproduto"})})
 * @ORM\Entity
 */
class ProdutoImagem
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_produto_imagem", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProdutoImagem;

    /**
     * @var \Imagem
     *
     * @ORM\ManyToOne(targetEntity="Imagem")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_imagem", referencedColumnName="id_imagem")
     * })
     */
    private $idImagem;

    /**
     * @var \Produto
     *
     * @ORM\ManyToOne(targetEntity="Produto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idproduto", referencedColumnName="id_produto")
     * })
     */
    private $idproduto;


}
