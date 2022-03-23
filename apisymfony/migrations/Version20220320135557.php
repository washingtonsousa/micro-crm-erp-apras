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
        $this->addSql('DROP TABLE __efmigrationshistory');
        $this->addSql('ALTER TABLE tb_banner CHANGE id_image id_image INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tb_carrier_region DROP FOREIGN KEY FK_tb_carrier_region_tb_carrier_id_carrier');
        $this->addSql('ALTER TABLE tb_carrier_region DROP FOREIGN KEY FK_tb_carrier_region_tb_region_id_region');
        $this->addSql('ALTER TABLE tb_carrier_region CHANGE id_carrier id_carrier INT DEFAULT NULL, CHANGE id_region id_region TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE tb_carrier_region ADD CONSTRAINT FK_490B7E0D99A4586C FOREIGN KEY (id_carrier) REFERENCES tb_carrier (id_carrier)');
        $this->addSql('ALTER TABLE tb_carrier_region ADD CONSTRAINT FK_490B7E0D2955449B FOREIGN KEY (id_region) REFERENCES tb_region (id_region)');
        $this->addSql('ALTER TABLE tb_credit_card DROP FOREIGN KEY FK_tb_credit_card_tb_customer_id_customer');
        $this->addSql('ALTER TABLE tb_credit_card CHANGE id_customer id_customer INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tb_credit_card ADD CONSTRAINT FK_786979F3D1E2629C FOREIGN KEY (id_customer) REFERENCES tb_customer (id_customer)');
        $this->addSql('ALTER TABLE tb_customer_address CHANGE id_customer id_customer INT DEFAULT NULL, CHANGE id_address id_address INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tb_modules ADD module_custom_path LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE tb_order_payment CHANGE id_payment_way id_payment_way INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tb_order_product DROP FOREIGN KEY fk_order_product_Order1');
        $this->addSql('ALTER TABLE tb_order_product CHANGE order_id_order order_id_order INT DEFAULT NULL, CHANGE product_id_product product_id_product INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tb_order_product ADD CONSTRAINT FK_568FD4B6FA543019 FOREIGN KEY (order_id_order) REFERENCES tb_order (id_order)');
        $this->addSql('ALTER TABLE tb_product_category CHANGE id_category id_category INT DEFAULT NULL, CHANGE id_product id_product INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tb_product_image CHANGE id_product id_product INT DEFAULT NULL, CHANGE id_image id_image INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE __efmigrationshistory (MigrationId VARCHAR(95) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, ProductVersion VARCHAR(32) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, PRIMARY KEY(MigrationId)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_0900_ai_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE tb_address CHANGE street street VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE number number VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE complement complement VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE postalcode postalcode VARCHAR(8) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE state state VARCHAR(2) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE city city VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_banner CHANGE id_image id_image INT NOT NULL, CHANGE taget-link taget-link VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE title title VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_carrier CHANGE name name TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_carrier_region DROP FOREIGN KEY FK_490B7E0D99A4586C');
        $this->addSql('ALTER TABLE tb_carrier_region DROP FOREIGN KEY FK_490B7E0D2955449B');
        $this->addSql('ALTER TABLE tb_carrier_region CHANGE id_carrier id_carrier INT NOT NULL, CHANGE id_region id_region TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE tb_carrier_region ADD CONSTRAINT FK_tb_carrier_region_tb_carrier_id_carrier FOREIGN KEY (id_carrier) REFERENCES tb_carrier (id_carrier) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tb_carrier_region ADD CONSTRAINT FK_tb_carrier_region_tb_region_id_region FOREIGN KEY (id_region) REFERENCES tb_region (id_region) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tb_category CHANGE description description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE icon icon VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_config CHANGE `key` `key` VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE value value VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_credit_card DROP FOREIGN KEY FK_786979F3D1E2629C');
        $this->addSql('ALTER TABLE tb_credit_card CHANGE id_customer id_customer INT NOT NULL, CHANGE key_card_gtw key_card_gtw TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE number number TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE owner owner TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE description description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_credit_card ADD CONSTRAINT FK_tb_credit_card_tb_customer_id_customer FOREIGN KEY (id_customer) REFERENCES tb_customer (id_customer) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tb_customer CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE name_social_legal_id name_social_legal_id VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE legal_name legal_name TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE person_type person_type VARCHAR(45) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE tax_category tax_category VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE documment documment VARCHAR(45) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE social_id social_id VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE state_tax_control_number state_tax_control_number VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE phone_primary phone_primary VARCHAR(45) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE phone_secondary phone_secondary VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE gender gender VARCHAR(1) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_customer_address CHANGE id_address id_address INT NOT NULL, CHANGE id_customer id_customer INT NOT NULL');
        $this->addSql('ALTER TABLE tb_image CHANGE url url VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE alt alt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE ext ext VARCHAR(3) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE relative_path relative_path VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_modules DROP module_custom_path, CHANGE name name TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE package_name package_name TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE description description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_order_payment CHANGE id_payment_way id_payment_way INT NOT NULL, CHANGE url_bill url_bill TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_order_product DROP FOREIGN KEY FK_568FD4B6FA543019');
        $this->addSql('ALTER TABLE tb_order_product CHANGE order_id_order order_id_order INT NOT NULL, CHANGE product_id_product product_id_product INT NOT NULL');
        $this->addSql('ALTER TABLE tb_order_product ADD CONSTRAINT fk_order_product_Order1 FOREIGN KEY (order_id_order) REFERENCES tb_order (id_order) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tb_payment_way CHANGE payment_way payment_way VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_product CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE ean ean VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE sku sku VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE size size VARCHAR(4) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_product_category CHANGE id_category id_category INT NOT NULL, CHANGE id_product id_product INT NOT NULL');
        $this->addSql('ALTER TABLE tb_product_image CHANGE id_image id_image INT NOT NULL, CHANGE id_product id_product INT NOT NULL');
        $this->addSql('ALTER TABLE tb_region CHANGE postalcode_start postalcode_start VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE postalcode_finish postalcode_finish VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE description description TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_store CHANGE legal_name legal_name VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE name name VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE web_domain web_domain VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE url url VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE store_legal_id store_legal_id VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE title title VARCHAR(45) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE tb_user CHANGE password password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE name name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE id_access_level id_access_level VARCHAR(25) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE documment documment VARCHAR(45) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE phone phone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE gender gender VARCHAR(1) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`');
    }
}
