<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220320135557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER Table produto DROP  FOREIGN KEY fk_produto_pedido_produto1');
       //  $this->addSql('ALTER Table pedido DROP  FOREIGN KEY fk_pedido_pedido_produto1');
       // $this->addSql('ALTER Table pedido DROP COLUMN id_pedido_produto');
       // $this->addSql('ALTER Table produto DROP  COLUMN id_pedido_produto');
       // $this->addSql('ALTER Table pedido DROP COLUMN id_pedido_produto');
        $this->addSql('ALTER Table pedido_produto ADD COLUMN id_produto int');
        $this->addSql('ALTER Table pedido_produto ADD COLUMN id_pedido int');
        $this->addSql('ALTER Table pedido_produto ADD CONSTRAINT id_pedido 
        FOREIGN KEY(id_pedido) REFERENCES pedido(id_pedido)');
        $this->addSql('ALTER Table pedido_produto ADD CONSTRAINT id_produto 
        FOREIGN KEY(id_produto) REFERENCES produto(id_produto)');

    }

    public function down(Schema $schema): void
    {
    }
}
