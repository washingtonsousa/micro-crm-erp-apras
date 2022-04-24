<?php

namespace App\Core\Domain\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="documento_UNIQUE", columns={"documento"}), @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"}), @ORM\UniqueConstraint(name="usuario_UNIQUE", columns={"usuario"})})
 * @ORM\Entity(repositoryClass="App\Core\Domain\Repository\UsuarioRepository")
 */
class Usuario implements JsonSerializable, UserInterface, PasswordAuthenticatedUserInterface
{

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);

        return $vars;
    }

    public function getPassword(): ?string {
        return $this->senha;
    }

    public function getRoles(): array {
                if($this->nivelAcesso == 1)
                   return array("ROLE_ADMIN");

                   return array("ROLE_FUNCIONARIO");
    }

    public function eraseCredentials() {

    }


    public function getUserIdentifier(): string {
        return $this->email;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;


    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="text", length=65535, nullable=false)
     */
    private $senha;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="data_criacao", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dataCriacao;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="data_atualizacao", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dataAtualizacao;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false, options={"default"="1"})
     */
    private $status = true;

    /**
     * @var int
     *
     * @ORM\Column(name="nivel_acesso", type="integer", nullable=false, options={"default"="1"})
     */
    private $nivelAcesso = 1;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="string", length=11, nullable=false)
     */
    private $documento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dt_ultimo_login", type="datetime", nullable=false)
     */
    private $dtUltimoLogin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="host_origem_ultimo_login", type="text", length=65535, nullable=true)
     */
    private $hostOrigemUltimoLogin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="localizacao_ultimo_login", type="text", length=65535, nullable=true)
     */
    private $localizacaoUltimoLogin;



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

    /**
     * Set the value of dtUltimoLogin
     *
     * @param  \DateTime  $dtUltimoLogin
     *
     * @return  self
     */ 
    public function setDtUltimoLogin(\DateTime $dtUltimoLogin)
    {
        $this->dtUltimoLogin = $dtUltimoLogin;

        return $this;
    }
}
