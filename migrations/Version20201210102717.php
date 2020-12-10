<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201210102717 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE porttypecompatible (idaistype INT NOT NULL, idport INT NOT NULL, INDEX IDX_2C02FFDB53BA86F9 (idaistype), INDEX IDX_2C02FFDB905EAC6C (idport), PRIMARY KEY(idaistype, idport)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE port (id INT AUTO_INCREMENT NOT NULL, idpays INT NOT NULL, nom VARCHAR(60) NOT NULL, indicatif VARCHAR(5) NOT NULL, INDEX IDX_43915DCCE750CD0E (idpays), UNIQUE INDEX portindicatif_unique (indicatif), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDB53BA86F9 FOREIGN KEY (idaistype) REFERENCES aisshiptype (id)');
        $this->addSql('ALTER TABLE porttypecompatible ADD CONSTRAINT FK_2C02FFDB905EAC6C FOREIGN KEY (idport) REFERENCES port (id)');
        $this->addSql('ALTER TABLE port ADD CONSTRAINT FK_43915DCCE750CD0E FOREIGN KEY (idpays) REFERENCES pays (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE porttypecompatible DROP FOREIGN KEY FK_2C02FFDB905EAC6C');
        $this->addSql('DROP TABLE porttypecompatible');
        $this->addSql('DROP TABLE port');
    }
}
