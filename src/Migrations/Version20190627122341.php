<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190627122341 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('SET FOREIGN_KEY_CHECKS=0;');
        $this->addSql('DROP TABLE community');
        $this->addSql('DROP TABLE community_user');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE platform');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE game_platform');
        $this->addSql('DROP TABLE tournament');
        $this->addSql('SET FOREIGN_KEY_CHECKS=1;');
        $this->addSql('CREATE TABLE communities (id INT AUTO_INCREMENT NOT NULL, game_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_ECE312BE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE communities_users (id INT AUTO_INCREMENT NOT NULL, community_id INT NOT NULL, user_id INT NOT NULL, roles JSON NOT NULL, INDEX IDX_6FF3DFADFDA7B0BF (community_id), INDEX IDX_6FF3DFADA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE games (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groups (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groups_users (id INT AUTO_INCREMENT NOT NULL, agroup_id INT NOT NULL, user_id INT NOT NULL, roles JSON NOT NULL, INDEX IDX_4520C24D36678767 (agroup_id), INDEX IDX_4520C24DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platforms (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groups_games (id INT AUTO_INCREMENT NOT NULL, agroup_id INT NOT NULL, game_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournaments (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, full_name VARCHAR(255) DEFAULT NULL, scheduled_start_date DATE DEFAULT NULL, scheduled_end_date DATE DEFAULT NULL, timezone VARCHAR(255) NOT NULL, public TINYINT(1) DEFAULT NULL, online TINYINT(1) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, registration_enabled TINYINT(1) DEFAULT NULL, registration_opening_datetime DATETIME DEFAULT NULL, organization VARCHAR(255) DEFAULT NULL, contact VARCHAR(255) DEFAULT NULL, discord VARCHAR(255) DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, rules VARCHAR(255) DEFAULT NULL, prize VARCHAR(255) DEFAULT NULL, match_reported_enabled TINYINT(1) DEFAULT NULL, registration_request_message VARCHAR(255) DEFAULT NULL, check_in_enabled TINYINT(1) DEFAULT NULL, check_in_participation_enabled TINYINT(1) DEFAULT NULL, check_in_participant_start_datetime DATETIME DEFAULT NULL, check_in_participant_end_datetime DATETIME DEFAULT NULL, archived TINYINT(1) DEFAULT NULL, registration_acceptance_message VARCHAR(255) DEFAULT NULL, registration_refusal_message VARCHAR(255) DEFAULT NULL, participant_type VARCHAR(255) NOT NULL, team_size_min INT DEFAULT NULL, team_size_max INT DEFAULT NULL, code VARCHAR(255) DEFAULT NULL, size INT NOT NULL, game_id int, agroup_id INT, community_id INT, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE games_platforms (id INT AUTO_INCREMENT NOT NULL, platform_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_A72356A0FFE6496F (platform_id), INDEX IDX_A72356A0E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE communities ADD CONSTRAINT FK_ECE312BE48FD905 FOREIGN KEY (game_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE communities_users ADD CONSTRAINT FK_6FF3DFADFDA7B0BF FOREIGN KEY (community_id) REFERENCES communities (id)');
        $this->addSql('ALTER TABLE communities_users ADD CONSTRAINT FK_6FF3DFADA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE groups_users ADD CONSTRAINT FK_4520C24D36678767 FOREIGN KEY (agroup_id) REFERENCES groups (id)');
        $this->addSql('ALTER TABLE groups_users ADD CONSTRAINT FK_4520C24DA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE tournaments ADD CONSTRAINT FK_E4BCFAC3E48FD905 FOREIGN KEY (game_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE tournaments ADD CONSTRAINT FK_E4BCFAC336678767 FOREIGN KEY (agroup_id) REFERENCES groups (id)');
        $this->addSql('ALTER TABLE tournaments ADD CONSTRAINT FK_E4BCFAC3FDA7B0BF FOREIGN KEY (community_id) REFERENCES communities (id)');
        $this->addSql('ALTER TABLE groups_games ADD CONSTRAINT FK_A716AFCE48FD905 FOREIGN KEY (game_id) REFERENCES games (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groups_games ADD CONSTRAINT FK_A716AFCFE54D947 FOREIGN KEY (agroup_id) REFERENCES groups (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tournaments DROP FOREIGN KEY FK_E4BCFAC3FDA7B0BF');
        $this->addSql('ALTER TABLE community_users DROP FOREIGN KEY FK_6FF3DFADFDA7B0BF');
        $this->addSql('ALTER TABLE communities DROP FOREIGN KEY FK_ECE312BE48FD905');
        $this->addSql('ALTER TABLE tournaments DROP FOREIGN KEY FK_E4BCFAC3E48FD905');
        $this->addSql('ALTER TABLE game_platform DROP FOREIGN KEY FK_92162FEDE48FD905');
        $this->addSql('ALTER TABLE groups_games DROP FOREIGN KEY FK_A716AFCE48FD905');
        $this->addSql('ALTER TABLE tournaments DROP FOREIGN KEY FK_E4BCFAC336678767');
        $this->addSql('ALTER TABLE groups_games DROP FOREIGN KEY FK_A716AFCFE54D947');
        $this->addSql('ALTER TABLE groups_users DROP FOREIGN KEY FK_4520C24D36678767');
        $this->addSql('ALTER TABLE game_platform DROP FOREIGN KEY FK_92162FEDFFE6496F');
        $this->addSql('ALTER TABLE community_users DROP FOREIGN KEY FK_6FF3DFADA76ED395');
        $this->addSql('ALTER TABLE groups_users DROP FOREIGN KEY FK_4520C24DA76ED395');
        $this->addSql('CREATE TABLE community (id INT AUTO_INCREMENT NOT NULL, game_id INT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, INDEX IDX_1B604033E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE community_user (id INT AUTO_INCREMENT NOT NULL, community_id INT NOT NULL, user_id INT NOT NULL, roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, INDEX IDX_4CC23C83A76ED395 (user_id), INDEX IDX_4CC23C83FDA7B0BF (community_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE group_user (id INT AUTO_INCREMENT NOT NULL, agroup_id INT NOT NULL, user_id INT NOT NULL, roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, INDEX IDX_A4C98D39A76ED395 (user_id), INDEX IDX_A4C98D3936678767 (agroup_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE platform (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tournament (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, community_id INT NOT NULL, agroup_id INT NOT NULL, name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, full_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, scheduled_start_date DATE DEFAULT \'NULL\', timezone VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, public TINYINT(1) DEFAULT \'NULL\', online TINYINT(1) DEFAULT \'NULL\', location VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, country VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, logo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, registration_enabled TINYINT(1) DEFAULT \'NULL\', registration_opening_datetime DATETIME DEFAULT \'NULL\', organization VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, contact VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, discord VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, website VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, rules VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, prize VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, match_reported_enabled TINYINT(1) DEFAULT \'NULL\', registration_request_message VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, check_in_enabled TINYINT(1) DEFAULT \'NULL\', check_in_participant_start_datetime DATETIME DEFAULT \'NULL\', check_in_participant_end_datetime DATETIME DEFAULT \'NULL\', archived TINYINT(1) DEFAULT \'NULL\', registration_acceptance_message VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, participant_type VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, team_size_min INT DEFAULT NULL, team_size_max INT DEFAULT NULL, code VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, size INT DEFAULT NULL, discr VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, scheduled_date_end DATE DEFAULT \'NULL\', registration_closing_datetime DATETIME DEFAULT \'NULL\', check_in_participant_enabled TINYINT(1) DEFAULT \'NULL\', registratiomn_refusal_message VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, INDEX IDX_BD5FB8D936678767 (agroup_id), INDEX IDX_BD5FB8D9FDA7B0BF (community_id), INDEX IDX_BD5FB8D9E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, password VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, first_name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, last_name VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE community ADD CONSTRAINT FK_1B604033E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE community_user ADD CONSTRAINT FK_4CC23C83A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE community_user ADD CONSTRAINT FK_4CC23C83FDA7B0BF FOREIGN KEY (community_id) REFERENCES community (id)');
        $this->addSql('ALTER TABLE group_user ADD CONSTRAINT FK_A4C98D3936678767 FOREIGN KEY (agroup_id) REFERENCES `group` (id)');
        $this->addSql('ALTER TABLE group_user ADD CONSTRAINT FK_A4C98D39A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE tournament ADD CONSTRAINT FK_BD5FB8D936678767 FOREIGN KEY (agroup_id) REFERENCES `group` (id)');
        $this->addSql('ALTER TABLE tournament ADD CONSTRAINT FK_BD5FB8D9E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE tournament ADD CONSTRAINT FK_BD5FB8D9FDA7B0BF FOREIGN KEY (community_id) REFERENCES community (id)');
        $this->addSql('DROP TABLE communities');
        $this->addSql('DROP TABLE community_users');
        $this->addSql('DROP TABLE games');
        $this->addSql('DROP TABLE groups');
        $this->addSql('DROP TABLE groups_users');
        $this->addSql('DROP TABLE platforms');
        $this->addSql('DROP TABLE users');
        $this->addSql('ALTER TABLE game_platform DROP FOREIGN KEY FK_92162FEDE48FD905');
        $this->addSql('ALTER TABLE game_platform DROP FOREIGN KEY FK_92162FEDFFE6496F');
        $this->addSql('ALTER TABLE game_platform ADD CONSTRAINT FK_92162FEDE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_platform ADD CONSTRAINT FK_92162FEDFFE6496F FOREIGN KEY (platform_id) REFERENCES platform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groups_games DROP FOREIGN KEY FK_A716AFCFE54D947');
        $this->addSql('ALTER TABLE groups_games DROP FOREIGN KEY FK_A716AFCE48FD905');
        $this->addSql('ALTER TABLE groups_games ADD CONSTRAINT FK_A716AFCFE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groups_games ADD CONSTRAINT FK_A716AFCE48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tournaments CHANGE game_id game_id INT DEFAULT NULL, CHANGE full_name full_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE scheduled_start_date scheduled_start_date DATE DEFAULT \'NULL\', CHANGE scheduled_date_end scheduled_date_end DATE DEFAULT \'NULL\', CHANGE timezone timezone VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE public public TINYINT(1) DEFAULT \'NULL\', CHANGE online online TINYINT(1) DEFAULT \'NULL\', CHANGE location location VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE country country VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE logo logo VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE registration_enabled registration_enabled TINYINT(1) DEFAULT \'NULL\', CHANGE registration_opening_datetime registration_opening_datetime DATETIME DEFAULT \'NULL\', CHANGE registration_closing_datetime registration_closing_datetime DATETIME DEFAULT \'NULL\', CHANGE organization organization VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE contact contact VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE discord discord VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE website website VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE description description VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE rules rules VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE prize prize VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE match_reported_enabled match_reported_enabled TINYINT(1) DEFAULT \'NULL\', CHANGE registration_request_message registration_request_message VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE check_in_enabled check_in_enabled TINYINT(1) DEFAULT \'NULL\', CHANGE check_in_participant_enabled check_in_participant_enabled TINYINT(1) DEFAULT \'NULL\', CHANGE check_in_participant_start_datetime check_in_participant_start_datetime DATETIME DEFAULT \'NULL\', CHANGE check_in_participant_end_datetime check_in_participant_end_datetime DATETIME DEFAULT \'NULL\', CHANGE archived archived TINYINT(1) DEFAULT \'NULL\', CHANGE registration_acceptance_message registration_acceptance_message VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE registratiomn_refusal_message registratiomn_refusal_message VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE participant_type participant_type VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE team_size_min team_size_min INT DEFAULT NULL, CHANGE team_size_max team_size_max INT DEFAULT NULL, CHANGE code code VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE size size INT DEFAULT NULL');
    }
}
