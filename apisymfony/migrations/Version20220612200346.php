<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220612200346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE cliente ADD Column cod_cliente VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE cliente Drop Column cod_cliente');


    }
}
