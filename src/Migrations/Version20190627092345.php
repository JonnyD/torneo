<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190627092345 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tournament (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, full_name VARCHAR(255) DEFAULT NULL, scheduled_start_date DATE DEFAULT NULL, scheduled_end_date DATE DEFAULT NULL, timezone VARCHAR(255) NOT NULL, public TINYINT(1) DEFAULT NULL, online TINYINT(1) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, registration_enabled TINYINT(1) DEFAULT NULL, registration_opening_datetime DATETIME DEFAULT NULL, organization VARCHAR(255) DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, discord VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, rules VARCHAR(255) DEFAULT NULL, prize VARCHAR(255) DEFAULT NULL, match_reported_enabled TINYINT(1) DEFAULT NULL, registration_request_message VARCHAR(255) DEFAULT NULL, check_in_enabled TINYINT(1) DEFAULT NULL, check_in_participation_enabled TINYINT(1) DEFAULT NULL, check_in_participant_start_datetime DATETIME DEFAULT NULL, check_in_participant_end_datetime DATETIME DEFAULT NULL, archived TINYINT(1) DEFAULT NULL, registration_acceptance_message VARCHAR(255) DEFAULT NULL, registration_refusal_message VARCHAR(255) DEFAULT NULL, participant_type VARCHAR(255) NOT NULL, team_size_min INT DEFAULT NULL, team_size_max INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, size INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tournament');
    }
}
