<?php

namespace App\Core\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produto
 *
 * @ORM\Table(name="produto", indexes={@ORM\Index(name="fk_produto_pedido_produto1_idx", columns={"id_pedido_produto"})})
 * @ORM\Entity
 */
class Produto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_produto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=true)
     */
    private $nome;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cor", type="string", length=255, nullable=true)
     */
    private $cor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tamanho", type="string", length=255, nullable=true)
     */
    private $tamanho;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descricao", type="string", length=255, nullable=true)
     */
    private $descricao;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dt_data_cadastro", type="datetime", nullable=true)
     */
    private $dtDataCadastro;

    


}
