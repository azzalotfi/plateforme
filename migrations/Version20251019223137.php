<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251019223137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription ADD admin_id INT NOT NULL, CHANGE date_inscription date_inscription DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6642B8210 FOREIGN KEY (admin_id) REFERENCES `admin` (id)');
        $this->addSql('CREATE INDEX IDX_5E90F6D6642B8210 ON inscription (admin_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6642B8210');
        $this->addSql('DROP INDEX IDX_5E90F6D6642B8210 ON inscription');
        $this->addSql('ALTER TABLE inscription DROP admin_id, CHANGE date_inscription date_inscription DATE NOT NULL');
    }
}
