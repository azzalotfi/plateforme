<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251201201101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abonnement (id_abo INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, prestataire_id INT DEFAULT NULL, type VARCHAR(100) NOT NULL, date_debut DATE DEFAULT NULL, date_fin DATE DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, status VARCHAR(50) NOT NULL, is_paid_to_prestataire TINYINT(1) NOT NULL, transaction_id VARCHAR(255) DEFAULT NULL, INDEX IDX_351268BB19EB6921 (client_id), INDEX IDX_351268BBBE3DB2B7 (prestataire_id), PRIMARY KEY(id_abo)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, privileges VARCHAR(255) DEFAULT NULL, date_creation DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nombre_reservation INT DEFAULT NULL, date_derniere_connexion DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, balance DOUBLE PRECISION DEFAULT \'0\', UNIQUE INDEX UNIQ_C7440455A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conversation (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, prestataire_id INT NOT NULL, service_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', last_message_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_8A8E26E919EB6921 (client_id), INDEX IDX_8A8E26E9BE3DB2B7 (prestataire_id), INDEX IDX_8A8E26E9ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription (id_insc INT AUTO_INCREMENT NOT NULL, admin_id INT NOT NULL, type_user VARCHAR(50) NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, email VARCHAR(180) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, date_inscription DATE DEFAULT NULL, statut VARCHAR(20) DEFAULT \'attente\' NOT NULL, UNIQUE INDEX UNIQ_5E90F6D6E7927C74 (email), INDEX IDX_5E90F6D6642B8210 (admin_id), PRIMARY KEY(id_insc)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, conversation_id INT NOT NULL, sender_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_read TINYINT(1) NOT NULL, INDEX IDX_B6BD307F9AC0396 (conversation_id), INDEX IDX_B6BD307FF624B39D (sender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, message VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_read TINYINT(1) NOT NULL, is_dismissed TINYINT(1) DEFAULT 0 NOT NULL, type VARCHAR(50) DEFAULT NULL, related_entity_id INT DEFAULT NULL, INDEX IDX_BF5476CAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payement (id_pay INT AUTO_INCREMENT NOT NULL, reservation_id INT NOT NULL, montant DOUBLE PRECISION NOT NULL, date_payement DATE DEFAULT NULL, statut VARCHAR(50) NOT NULL, rembourse TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_B20A7885B83297E7 (reservation_id), PRIMARY KEY(id_pay)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, categorie_service VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, note_moyenne DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_60A26480A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, prestataire_id INT DEFAULT NULL, service_id INT DEFAULT NULL, date_reservation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', heure TIME DEFAULT NULL, statut VARCHAR(50) DEFAULT NULL, montant_total DOUBLE PRECISION DEFAULT NULL, lieu VARCHAR(255) DEFAULT NULL, INDEX IDX_42C8495519EB6921 (client_id), INDEX IDX_42C84955BE3DB2B7 (prestataire_id), INDEX IDX_42C84955ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review (id INT AUTO_INCREMENT NOT NULL, client_id INT DEFAULT NULL, service_id INT DEFAULT NULL, note INT NOT NULL, commentaire LONGTEXT DEFAULT NULL, date_avis DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_794381C619EB6921 (client_id), INDEX IDX_794381C6ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, prestataire_id INT DEFAULT NULL, nom_service VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, prix DOUBLE PRECISION DEFAULT NULL, duree INT DEFAULT NULL, categorie VARCHAR(100) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, disponible TINYINT(1) DEFAULT 1 NOT NULL, INDEX IDX_E19D9AD2BE3DB2B7 (prestataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(100) NOT NULL, prenom VARCHAR(100) NOT NULL, email VARCHAR(180) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, tel VARCHAR(20) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, date_inscription DATE DEFAULT NULL, bio LONGTEXT DEFAULT NULL, competences VARCHAR(255) DEFAULT NULL, role VARCHAR(20) NOT NULL, rating DOUBLE PRECISION DEFAULT \'0\', total_gains DOUBLE PRECISION DEFAULT \'0\', completed INT DEFAULT 0, reviews_count INT DEFAULT 0, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BB19EB6921 FOREIGN KEY (client_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE abonnement ADD CONSTRAINT FK_351268BBBE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E9BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8A8E26E9ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D6642B8210 FOREIGN KEY (admin_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F9AC0396 FOREIGN KEY (conversation_id) REFERENCES conversation (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FF624B39D FOREIGN KEY (sender_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE payement ADD CONSTRAINT FK_B20A7885B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE prestataire ADD CONSTRAINT FK_60A26480A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495519EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C619EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE review ADD CONSTRAINT FK_794381C6ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BB19EB6921');
        $this->addSql('ALTER TABLE abonnement DROP FOREIGN KEY FK_351268BBBE3DB2B7');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A76ED395');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E919EB6921');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E9BE3DB2B7');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8A8E26E9ED5CA9E6');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D6642B8210');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F9AC0396');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FF624B39D');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAA76ED395');
        $this->addSql('ALTER TABLE payement DROP FOREIGN KEY FK_B20A7885B83297E7');
        $this->addSql('ALTER TABLE prestataire DROP FOREIGN KEY FK_60A26480A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495519EB6921');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955BE3DB2B7');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955ED5CA9E6');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C619EB6921');
        $this->addSql('ALTER TABLE review DROP FOREIGN KEY FK_794381C6ED5CA9E6');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2BE3DB2B7');
        $this->addSql('DROP TABLE abonnement');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE conversation');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE payement');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE review');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
