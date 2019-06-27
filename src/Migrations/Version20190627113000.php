<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190627113000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_game (group_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_A716AFCFE54D947 (group_id), INDEX IDX_A716AFCE48FD905 (game_id), PRIMARY KEY(group_id, game_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE group_game ADD CONSTRAINT FK_A716AFCFE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE group_game ADD CONSTRAINT FK_A716AFCE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tournament ADD agroup_id INT NOT NULL, CHANGE game_id game_id INT DEFAULT NULL, CHANGE full_name full_name VARCHAR(255) DEFAULT NULL, CHANGE scheduled_start_date scheduled_start_date DATE DEFAULT NULL, CHANGE timezone timezone VARCHAR(255) DEFAULT NULL, CHANGE public public TINYINT(1) DEFAULT NULL, CHANGE online online TINYINT(1) DEFAULT NULL, CHANGE location location VARCHAR(255) DEFAULT NULL, CHANGE country country VARCHAR(255) DEFAULT NULL, CHANGE logo logo VARCHAR(255) DEFAULT NULL, CHANGE registration_enabled registration_enabled TINYINT(1) DEFAULT NULL, CHANGE registration_opening_datetime registration_opening_datetime DATETIME DEFAULT NULL, CHANGE organization organization VARCHAR(255) DEFAULT NULL, CHANGE contact contact VARCHAR(255) DEFAULT NULL, CHANGE discord discord VARCHAR(255) DEFAULT NULL, CHANGE website website VARCHAR(255) DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE rules rules VARCHAR(255) DEFAULT NULL, CHANGE prize prize VARCHAR(255) DEFAULT NULL, CHANGE match_reported_enabled match_reported_enabled TINYINT(1) DEFAULT NULL, CHANGE registration_request_message registration_request_message VARCHAR(255) DEFAULT NULL, CHANGE check_in_enabled check_in_enabled TINYINT(1) DEFAULT NULL, CHANGE check_in_participant_start_datetime check_in_participant_start_datetime DATETIME DEFAULT NULL, CHANGE check_in_participant_end_datetime check_in_participant_end_datetime DATETIME DEFAULT NULL, CHANGE archived archived TINYINT(1) DEFAULT NULL, CHANGE registration_acceptance_message registration_acceptance_message VARCHAR(255) DEFAULT NULL, CHANGE participant_type participant_type VARCHAR(255) DEFAULT NULL, CHANGE team_size_min team_size_min INT DEFAULT NULL, CHANGE team_size_max team_size_max INT DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT NULL, CHANGE size size INT DEFAULT NULL, CHANGE scheduled_date_end scheduled_date_end DATE DEFAULT NULL, CHANGE registration_closing_datetime registration_closing_datetime DATETIME DEFAULT NULL, CHANGE check_in_participant_enabled check_in_participant_enabled TINYINT(1) DEFAULT NULL, CHANGE registratiomn_refusal_message registratiomn_refusal_message VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE tournament ADD CONSTRAINT FK_BD5FB8D936678767 FOREIGN KEY (agroup_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_BD5FB8D936678767 ON tournament (agroup_id)');
        $this->addSql('ALTER TABLE community_user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tournament DROP FOREIGN KEY FK_BD5FB8D936678767');
        $this->addSql('ALTER TABLE group_game DROP FOREIGN KEY FK_A716AFCFE54D947');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE group_game');
        $this->addSql('ALTER TABLE community_user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
        $this->addSql('DROP INDEX IDX_BD5FB8D936678767 ON tournament');
        $this->addSql('ALTER TABLE tournament DROP agroup_id, CHANGE game_id game_id INT DEFAULT NULL, CHANGE full_name full_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE scheduled_start_date scheduled_start_date DATE DEFAULT \'NULL\', CHANGE scheduled_date_end scheduled_date_end DATE DEFAULT \'NULL\', CHANGE timezone timezone VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE public public TINYINT(1) DEFAULT \'NULL\', CHANGE online online TINYINT(1) DEFAULT \'NULL\', CHANGE location location VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE country country VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE logo logo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE registration_enabled registration_enabled TINYINT(1) DEFAULT \'NULL\', CHANGE registration_opening_datetime registration_opening_datetime DATETIME DEFAULT \'NULL\', CHANGE registration_closing_datetime registration_closing_datetime DATETIME DEFAULT \'NULL\', CHANGE organization organization VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE contact contact VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE discord discord VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE website website VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE description description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE rules rules VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE prize prize VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE match_reported_enabled match_reported_enabled TINYINT(1) DEFAULT \'NULL\', CHANGE registration_request_message registration_request_message VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE check_in_enabled check_in_enabled TINYINT(1) DEFAULT \'NULL\', CHANGE check_in_participant_enabled check_in_participant_enabled TINYINT(1) DEFAULT \'NULL\', CHANGE check_in_participant_start_datetime check_in_participant_start_datetime DATETIME DEFAULT \'NULL\', CHANGE check_in_participant_end_datetime check_in_participant_end_datetime DATETIME DEFAULT \'NULL\', CHANGE archived archived TINYINT(1) DEFAULT \'NULL\', CHANGE registration_acceptance_message registration_acceptance_message VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE registratiomn_refusal_message registratiomn_refusal_message VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE participant_type participant_type VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE team_size_min team_size_min INT DEFAULT NULL, CHANGE team_size_max team_size_max INT DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE size size INT DEFAULT NULL');
    }
}
