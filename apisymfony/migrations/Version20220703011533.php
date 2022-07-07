<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220703011533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE usuario_historico_ficha (id_usuario_ficha_historico INT AUTO_INCREMENT NOT NULL, id_ficha_producao INT NOT NULL, id_usuario INT NOT NULL, estado_ficha INT NOT NULL, dt_historico DATETIME NOT NULL, INDEX fk_usuario_historico_idx (id_usuario), INDEX fk_ficha_producao_historico_idx (id_ficha_producao), PRIMARY KEY(id_usuario_ficha_historico)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE usuario_historico_ficha ADD CONSTRAINT FK_2F67ADC4C29DC7EC FOREIGN KEY (id_ficha_producao) REFERENCES ficha_producao (id_ficha_producao)');
        $this->addSql('ALTER TABLE usuario_historico_ficha ADD CONSTRAINT FK_2F67ADC4FCF8192D FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario)');
        $this->addSql('ALTER TABLE ficha_producao DROP FOREIGN KEY fk_ficha_producao_usuario1');
        $this->addSql('ALTER TABLE ficha_producao DROP FOREIGN KEY fk_ficha_producao_usuario2');
        $this->addSql('ALTER TABLE ficha_producao DROP FOREIGN KEY fk_ficha_producao_usuario3');
        $this->addSql('ALTER TABLE ficha_producao DROP FOREIGN KEY fk_ficha_producao_usuario4');
        $this->addSql('DROP INDEX fk_ficha_producao_usuario1_idx ON ficha_producao');
        $this->addSql('DROP INDEX fk_ficha_producao_usuario2_idx ON ficha_producao');
        $this->addSql('DROP INDEX fk_ficha_producao_usuario3_idx ON ficha_producao');
        $this->addSql('DROP INDEX fk_ficha_producao_usuario4_idx ON ficha_producao');
        $this->addSql('ALTER TABLE ficha_producao DROP id_usuario_corte_separacao, DROP id_usuario_bordado_estamparia, DROP id_usuario_costura, DROP id_usuario_cadastro_ficha, CHANGE id_pedido_produto id_pedido_produto INT NOT NULL');
        $this->addSql('ALTER TABLE ficha_producao RENAME INDEX fk_ficha_producao_pedido_produto1_idx TO IDX_FFFB7AEA3B37CBF');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE usuario_historico_ficha');
        $this->addSql('ALTER TABLE cliente CHANGE str_nome str_nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE cod_cliente cod_cliente VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE ficha_producao ADD id_usuario_corte_separacao INT DEFAULT NULL, ADD id_usuario_bordado_estamparia INT DEFAULT NULL, ADD id_usuario_costura INT DEFAULT NULL, ADD id_usuario_cadastro_ficha INT DEFAULT NULL, CHANGE id_pedido_produto id_pedido_produto INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ficha_producao ADD CONSTRAINT fk_ficha_producao_usuario1 FOREIGN KEY (id_usuario_corte_separacao) REFERENCES usuario (id_usuario) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ficha_producao ADD CONSTRAINT fk_ficha_producao_usuario2 FOREIGN KEY (id_usuario_bordado_estamparia) REFERENCES usuario (id_usuario) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ficha_producao ADD CONSTRAINT fk_ficha_producao_usuario3 FOREIGN KEY (id_usuario_costura) REFERENCES usuario (id_usuario) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE ficha_producao ADD CONSTRAINT fk_ficha_producao_usuario4 FOREIGN KEY (id_usuario_cadastro_ficha) REFERENCES usuario (id_usuario) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX fk_ficha_producao_usuario1_idx ON ficha_producao (id_usuario_corte_separacao)');
        $this->addSql('CREATE INDEX fk_ficha_producao_usuario2_idx ON ficha_producao (id_usuario_bordado_estamparia)');
        $this->addSql('CREATE INDEX fk_ficha_producao_usuario3_idx ON ficha_producao (id_usuario_costura)');
        $this->addSql('CREATE INDEX fk_ficha_producao_usuario4_idx ON ficha_producao (id_usuario_cadastro_ficha)');
        $this->addSql('ALTER TABLE ficha_producao RENAME INDEX idx_fffb7aea3b37cbf TO fk_ficha_producao_pedido_produto1_idx');
        $this->addSql('ALTER TABLE imagem CHANGE url url TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE absolut_path absolut_path TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE log CHANGE `key` `key` VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE value value TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE pedido CHANGE txt_observacoes txt_observacoes TEXT CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE produto CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE codigo_produto codigo_produto VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE cor cor VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE tamanho tamanho VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE descricao descricao VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHANGE cod_cliente cod_cliente VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`');
        $this->addSql('ALTER TABLE usuario CHANGE nome nome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE senha senha TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, CHANGE documento documento VARCHAR(11) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');
    }
}
