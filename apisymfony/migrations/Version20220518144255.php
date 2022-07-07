<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220518144255 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
         $this->addSql('CREATE UNIQUE INDEX UNIQ_A5136F422A813255 ON cliente_imagem (id_cliente)');
         $this->addSql('CREATE UNIQUE INDEX UNIQ_A5136F423C2736E4 ON cliente_imagem (id_imagem)');
         $this->addSql('ALTER TABLE produto_imagem DROP FOREIGN KEY fk_produto_imagem_produto1');
         $this->addSql('DROP INDEX fk_produto_imagem_produto1_idx ON produto_imagem');
         $this->addSql('ALTER TABLE produto_imagem ADD id_produto INT NOT NULL, DROP idproduto, CHANGE id_imagem id_imagem INT NOT NULL');
         $this->addSql('ALTER TABLE produto_imagem ADD CONSTRAINT FK_911CC0688231E0A7 FOREIGN KEY (id_produto) REFERENCES produto (id_produto)');
         $this->addSql('CREATE INDEX fk_produto_imagem_produto1_idx ON produto_imagem (id_produto)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cliente CHANGE str_nome str_nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('DROP INDEX UNIQ_A5136F422A813255 ON cliente_imagem');
        $this->addSql('DROP INDEX UNIQ_A5136F423C2736E4 ON cliente_imagem');
        $this->addSql('ALTER TABLE imagem CHANGE url url TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE absolut_path absolut_path TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE log CHANGE `key` `key` VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE value value TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE pedido CHANGE txt_observacoes txt_observacoes TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE produto CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE codigo_produto codigo_produto VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE cor cor VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE tamanho tamanho VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE descricao descricao VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE produto_imagem DROP FOREIGN KEY FK_911CC0688231E0A7');
        $this->addSql('DROP INDEX fk_produto_imagem_produto1_idx ON produto_imagem');
        $this->addSql('ALTER TABLE produto_imagem ADD idproduto INT DEFAULT NULL, DROP id_produto, CHANGE id_imagem id_imagem INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produto_imagem ADD CONSTRAINT fk_produto_imagem_produto1 FOREIGN KEY (idproduto) REFERENCES produto (id_produto) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX fk_produto_imagem_produto1_idx ON produto_imagem (idproduto)');
        $this->addSql('ALTER TABLE usuario CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE senha senha TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE documento documento VARCHAR(11) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
    }
}
