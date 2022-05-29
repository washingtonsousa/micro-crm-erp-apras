<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220528234704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pedido ADD dt_criacao DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
        $this->addSql('ALTER TABLE pedido_produto CHANGE id_produto id_produto INT NOT NULL, CHANGE id_pedido id_pedido INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_911CC0683C2736E4 ON produto_imagem (id_imagem)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_911CC0688231E0A7 ON produto_imagem (id_produto)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cliente CHANGE str_nome str_nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE imagem CHANGE url url TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE absolut_path absolut_path TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE log CHANGE `key` `key` VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE value value TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE pedido DROP dt_criacao, CHANGE txt_observacoes txt_observacoes TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE pedido_produto CHANGE id_produto id_produto INT DEFAULT NULL, CHANGE id_pedido id_pedido INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produto CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE codigo_produto codigo_produto VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE cor cor VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE tamanho tamanho VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE descricao descricao VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('DROP INDEX UNIQ_911CC0683C2736E4 ON produto_imagem');
        $this->addSql('DROP INDEX UNIQ_911CC0688231E0A7 ON produto_imagem');
        $this->addSql('ALTER TABLE usuario CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE senha senha TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE documento documento VARCHAR(11) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
    }
}
