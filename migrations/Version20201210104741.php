<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201210104741 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD3158E975');
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD359265CEB');
        $this->addSql('DROP INDEX IDX_C39FEDD3158E975 ON escale');
        $this->addSql('DROP INDEX IDX_C39FEDD359265CEB ON escale');
        $this->addSql('ALTER TABLE escale ADD idnavire INT NOT NULL, ADD idport INT NOT NULL, DROP le_navire_id, DROP le_port_id');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD36A50BD94 FOREIGN KEY (idnavire) REFERENCES navire (id)');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD3905EAC6C FOREIGN KEY (idport) REFERENCES port (id)');
        $this->addSql('CREATE INDEX IDX_C39FEDD36A50BD94 ON escale (idnavire)');
        $this->addSql('CREATE INDEX IDX_C39FEDD3905EAC6C ON escale (idport)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD36A50BD94');
        $this->addSql('ALTER TABLE escale DROP FOREIGN KEY FK_C39FEDD3905EAC6C');
        $this->addSql('DROP INDEX IDX_C39FEDD36A50BD94 ON escale');
        $this->addSql('DROP INDEX IDX_C39FEDD3905EAC6C ON escale');
        $this->addSql('ALTER TABLE escale ADD le_navire_id INT NOT NULL, ADD le_port_id INT NOT NULL, DROP idnavire, DROP idport');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD3158E975 FOREIGN KEY (le_navire_id) REFERENCES navire (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE escale ADD CONSTRAINT FK_C39FEDD359265CEB FOREIGN KEY (le_port_id) REFERENCES port (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_C39FEDD3158E975 ON escale (le_navire_id)');
        $this->addSql('CREATE INDEX IDX_C39FEDD359265CEB ON escale (le_port_id)');
    }
}
