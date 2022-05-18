<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220518123434 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ficha_producao CHANGE id_pedido_produto id_pedido_produto INT DEFAULT NULL, CHANGE id_usuario_cadastro_ficha id_usuario_cadastro_ficha INT DEFAULT NULL, CHANGE estado_ficha estado_ficha INT NOT NULL');
        $this->addSql('ALTER TABLE imagem CHANGE web web TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE log CHANGE id_usuario id_usuario INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pacote_estoque_cliente CHANGE id_ficha_producao id_ficha_producao INT DEFAULT NULL, CHANGE id_usuario_envio id_usuario_envio INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pedido CHANGE id_cliente id_cliente INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pedido_produto RENAME INDEX id_produto TO IDX_3ED5C1B98231E0A7');
        $this->addSql('ALTER TABLE pedido_produto RENAME INDEX id_pedido TO IDX_3ED5C1B9E2DBA323');
        $this->addSql('ALTER TABLE produto ADD codigo_produto VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produto_imagem CHANGE id_imagem id_imagem INT DEFAULT NULL, CHANGE idproduto idproduto INT DEFAULT NULL');
        $this->addSql('ALTER TABLE usuario CHANGE data_atualizacao data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cliente CHANGE str_nome str_nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE ficha_producao CHANGE id_pedido_produto id_pedido_produto INT NOT NULL, CHANGE id_usuario_cadastro_ficha id_usuario_cadastro_ficha INT NOT NULL, CHANGE estado_ficha estado_ficha INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE imagem CHANGE url url TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE absolut_path absolut_path TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE web web TINYINT(1) DEFAULT 0');
        $this->addSql('ALTER TABLE log CHANGE id_usuario id_usuario INT NOT NULL, CHANGE `key` `key` VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE value value TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE pacote_estoque_cliente CHANGE id_ficha_producao id_ficha_producao INT NOT NULL, CHANGE id_usuario_envio id_usuario_envio INT NOT NULL');
        $this->addSql('ALTER TABLE pedido CHANGE id_cliente id_cliente INT NOT NULL, CHANGE txt_observacoes txt_observacoes TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE pedido_produto RENAME INDEX idx_3ed5c1b9e2dba323 TO id_pedido');
        $this->addSql('ALTER TABLE pedido_produto RENAME INDEX idx_3ed5c1b98231e0a7 TO id_produto');
        $this->addSql('ALTER TABLE produto DROP codigo_produto, CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE cor cor VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE tamanho tamanho VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE descricao descricao VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE produto_imagem CHANGE id_imagem id_imagem INT NOT NULL, CHANGE idproduto idproduto INT NOT NULL');
        $this->addSql('ALTER TABLE usuario CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE senha senha TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE data_atualizacao data_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE email email VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE documento documento VARCHAR(11) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
    }
}
