<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201210104338 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE escale (id INT AUTO_INCREMENT NOT NULL, le_navire_id INT NOT NULL, le_port_id INT NOT NULL, date_heure_arrivee DATETIME NOT NULL, INDEX IDX_C39FEDD3158E975 (le_navire_id), INDEX IDX_C39FEDD359265CEB (le_port_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD3158E975 FOREIGN KEY (le_navire_id) REFERENCES navire (id)');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD359265CEB FOREIGN KEY (le_port_id) REFERENCES port (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE escale');
    }
}
