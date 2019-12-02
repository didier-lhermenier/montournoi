<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191202085908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE contest (id INT AUTO_INCREMENT NOT NULL, gamer1_id INT NOT NULL, gamer2_id INT NOT NULL, sport_id INT NOT NULL, pool_id INT DEFAULT NULL, score1 SMALLINT DEFAULT NULL, score2 SMALLINT DEFAULT NULL, round SMALLINT DEFAULT NULL, in_progress TINYINT(1) NOT NULL, INDEX IDX_1A95CB52297DB63 (gamer1_id), INDEX IDX_1A95CB53022748D (gamer2_id), INDEX IDX_1A95CB5AC78BCF8 (sport_id), INDEX IDX_1A95CB57B3406DF (pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gamer (id INT AUTO_INCREMENT NOT NULL, manager_id INT NOT NULL, name VARCHAR(255) NOT NULL, pseudo VARCHAR(50) NOT NULL, email VARCHAR(100) DEFAULT NULL, avatar VARCHAR(255) DEFAULT NULL, INDEX IDX_88241BA7783E3463 (manager_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manager (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_FA2425B9F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pool (id INT AUTO_INCREMENT NOT NULL, tournament_id INT NOT NULL, INDEX IDX_AF91A98633D1A3E7 (tournament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sport (id INT AUTO_INCREMENT NOT NULL, tournament_id INT NOT NULL, name VARCHAR(255) NOT NULL, area_qty SMALLINT NOT NULL, prefix VARCHAR(10) NOT NULL, letter VARCHAR(1) NOT NULL, area_name VARCHAR(50) NOT NULL, INDEX IDX_1A85EFD233D1A3E7 (tournament_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournament (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, is_private TINYINT(1) NOT NULL, picture VARCHAR(255) DEFAULT NULL, date_begin DATETIME NOT NULL, date_end DATETIME DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, max_gamers SMALLINT NOT NULL, is_free TINYINT(1) NOT NULL, price NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournament_gamer (tournament_id INT NOT NULL, gamer_id INT NOT NULL, INDEX IDX_49728BBE33D1A3E7 (tournament_id), INDEX IDX_49728BBE2F43A116 (gamer_id), PRIMARY KEY(tournament_id, gamer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contest ADD CONSTRAINT FK_1A95CB52297DB63 FOREIGN KEY (gamer1_id) REFERENCES gamer (id)');
        $this->addSql('ALTER TABLE contest ADD CONSTRAINT FK_1A95CB53022748D FOREIGN KEY (gamer2_id) REFERENCES gamer (id)');
        $this->addSql('ALTER TABLE contest ADD CONSTRAINT FK_1A95CB5AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('ALTER TABLE contest ADD CONSTRAINT FK_1A95CB57B3406DF FOREIGN KEY (pool_id) REFERENCES pool (id)');
        $this->addSql('ALTER TABLE gamer ADD CONSTRAINT FK_88241BA7783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id)');
        $this->addSql('ALTER TABLE pool ADD CONSTRAINT FK_AF91A98633D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id)');
        $this->addSql('ALTER TABLE sport ADD CONSTRAINT FK_1A85EFD233D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id)');
        $this->addSql('ALTER TABLE tournament_gamer ADD CONSTRAINT FK_49728BBE33D1A3E7 FOREIGN KEY (tournament_id) REFERENCES tournament (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tournament_gamer ADD CONSTRAINT FK_49728BBE2F43A116 FOREIGN KEY (gamer_id) REFERENCES gamer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE contest DROP FOREIGN KEY FK_1A95CB52297DB63');
        $this->addSql('ALTER TABLE contest DROP FOREIGN KEY FK_1A95CB53022748D');
        $this->addSql('ALTER TABLE tournament_gamer DROP FOREIGN KEY FK_49728BBE2F43A116');
        $this->addSql('ALTER TABLE gamer DROP FOREIGN KEY FK_88241BA7783E3463');
        $this->addSql('ALTER TABLE contest DROP FOREIGN KEY FK_1A95CB57B3406DF');
        $this->addSql('ALTER TABLE contest DROP FOREIGN KEY FK_1A95CB5AC78BCF8');
        $this->addSql('ALTER TABLE pool DROP FOREIGN KEY FK_AF91A98633D1A3E7');
        $this->addSql('ALTER TABLE sport DROP FOREIGN KEY FK_1A85EFD233D1A3E7');
        $this->addSql('ALTER TABLE tournament_gamer DROP FOREIGN KEY FK_49728BBE33D1A3E7');
        $this->addSql('DROP TABLE contest');
        $this->addSql('DROP TABLE gamer');
        $this->addSql('DROP TABLE manager');
        $this->addSql('DROP TABLE pool');
        $this->addSql('DROP TABLE sport');
        $this->addSql('DROP TABLE tournament');
        $this->addSql('DROP TABLE tournament_gamer');
    }
}
