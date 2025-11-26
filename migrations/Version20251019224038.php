<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251019224038 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnement CHANGE date_debut date_debut DATE DEFAULT NULL, CHANGE date_fin date_fin DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE payement DROP INDEX IDX_B20A7885B83297E7, ADD UNIQUE INDEX UNIQ_B20A7885B83297E7 (reservation_id)');
        $this->addSql('ALTER TABLE payement CHANGE date_payement date_payement DATE DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnement CHANGE date_debut date_debut DATE NOT NULL, CHANGE date_fin date_fin DATE NOT NULL');
        $this->addSql('ALTER TABLE payement DROP INDEX UNIQ_B20A7885B83297E7, ADD INDEX IDX_B20A7885B83297E7 (reservation_id)');
        $this->addSql('ALTER TABLE payement CHANGE date_payement date_payement DATE NOT NULL');
    }
}
