<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201210095430 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aisshiptype CHANGE ais_ship_type aisshiptype INT NOT NULL');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038A4145E55 FOREIGN KEY (id_ais_ship_type_id) REFERENCES aisshiptype (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aisshiptype CHANGE aisshiptype ais_ship_type INT NOT NULL');
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038A4145E55');
    }
}
