<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201210095053 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038A4145E55');
        $this->addSql('CREATE TABLE aisshiptype (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(60) NOT NULL, ais_ship_type INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE ais_ship_type');
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038A4145E55');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038A4145E55 FOREIGN KEY (id_ais_ship_type_id) REFERENCES aisshiptype (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038A4145E55');
        $this->addSql('CREATE TABLE ais_ship_type (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(60) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ais_ship_type INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE aisshiptype');
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038A4145E55');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038A4145E55 FOREIGN KEY (id_ais_ship_type_id) REFERENCES ais_ship_type (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
