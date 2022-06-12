<?php

namespace App\Core\Domain\Entity;

use App\Core\Domain\Abstraction\Serializable\SerializableEntity;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use JsonSerializable;


/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="documento_UNIQUE", columns={"documento"}), @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"})})
 * @ORM\Entity(repositoryClass="App\Core\Domain\Repository\UsuarioRepository")
 */
class Usuario extends SerializableEntity implements  UserInterface, PasswordAuthenticatedUserInterface
{

   /**
     * @var int
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    public $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="text", length=65535, nullable=false)
     */
    public $senha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    public ?DateTime $dataCriacao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_atualizacao", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    public ?DateTime $dataAtualizacao;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false, options={"default"="1"})
     */
    public $status = true;

    /**
     * @var int
     *
     * @ORM\Column(name="nivel_acesso", type="integer", nullable=false, options={"default"="1"})
     */
    public $nivelAcesso = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    public $email;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="string", length=11, nullable=false)
     */
    public $documento;

    /**
     * 
     * @ORM\OneToMany(targetEntity="Log", mappedBy="idUsuario", cascade={"all"})
     */
    public $logs;


     //////////////// Methods ////////////////////


    /**
     * Set the value of senha
     *
     * @param  string  $senha
     *
     * @return  self
     */ 
    public function setSenha(string $senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;

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
     * Set the value of documento
     *
     * @param  string  $documento
     *
     * @return  self
     */ 
    public function setDocumento(string $documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Set the value of status
     *
     * @param  bool  $status
     *
     * @return  self
     */ 
    public function setStatus(bool $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set the value of nivelAcesso
     *
     * @param  int  $nivelAcesso
     *
     * @return  self
     */ 
    public function setNivelAcesso(int $nivelAcesso)
    {
        $this->nivelAcesso = $nivelAcesso;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

      /**
     * Get the value of username
     *
     * @return  string
     */ 
    public function getUserName()
    {
        return $this->email;
    }

    /**
     * Get the value of documento
     *
     * @return  string
     */ 
    public function getDocumento()
    {
        return $this->documento;
    }


    public function getPassword(): ?string {
        return $this->senha;
    }

    public function getRoles(): array {
                if($this->nivelAcesso == 2)
                   return array("ROLE_ADMIN");

                   return array("ROLE_FUNCIONARIO");
    }

    public function eraseCredentials() {

    }


    public function  fullUpdate(Usuario $usuario) {

        $this->email = $usuario->getEmail();

    }

    public function getUserIdentifier(): string {
        return $this->email;
    }


    /**
     * Get the value of logs
     */ 
    public function getLogs()
    {
        return $this->logs;
    }

    /**
     * Get the value of dataCriacao
     *
     * @return  \DateTime
     */ 
    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }


    /**
     * Get the value of dataAtualizacao
     *
     * @return  \DateTime
     */ 
    public function getDataAtualizacao()
    {
        return $this->dataAtualizacao;
    }

    /**
     * Set the value of dataAtualizacao
     *
     * @param  \DateTime  $dataAtualizacao
     *
     * @return  self
     */ 
    public function setDataAtualizacao(\DateTime $dataAtualizacao)
    {
        $this->dataAtualizacao = $dataAtualizacao;

        return $this;
    }

    /**
     * Set the value of dataCriacao
     *
     * @param  \DateTime  $dataCriacao
     *
     * @return  self
     */ 
    public function setDataCriacao(\DateTime $dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
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
