<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201210105415 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED1038A4145E55');
        $this->addSql('DROP INDEX IDX_EED1038A4145E55 ON navire');
        $this->addSql('ALTER TABLE navire CHANGE id_ais_ship_type_id idaisshiptype INT NOT NULL, CHANGE indicatif_appel indicatifappel VARCHAR(10) NOT NULL');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED103839F5FA88 FOREIGN KEY (idaisshiptype) REFERENCES aisshiptype (id)');
        $this->addSql('CREATE INDEX IDX_EED103839F5FA88 ON navire (idaisshiptype)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE navire DROP FOREIGN KEY FK_EED103839F5FA88');
        $this->addSql('DROP INDEX IDX_EED103839F5FA88 ON navire');
        $this->addSql('ALTER TABLE navire CHANGE idaisshiptype id_ais_ship_type_id INT NOT NULL, CHANGE indicatifappel indicatif_appel VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE navire ADD CONSTRAINT FK_EED1038A4145E55 FOREIGN KEY (id_ais_ship_type_id) REFERENCES aisshiptype (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_EED1038A4145E55 ON navire (id_ais_ship_type_id)');
    }
}
