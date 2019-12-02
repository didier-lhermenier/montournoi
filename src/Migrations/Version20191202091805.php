<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191202091805 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tournament ADD manager_id INT NOT NULL');
        $this->addSql('ALTER TABLE tournament ADD CONSTRAINT FK_BD5FB8D9783E3463 FOREIGN KEY (manager_id) REFERENCES manager (id)');
        $this->addSql('CREATE INDEX IDX_BD5FB8D9783E3463 ON tournament (manager_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tournament DROP FOREIGN KEY FK_BD5FB8D9783E3463');
        $this->addSql('DROP INDEX IDX_BD5FB8D9783E3463 ON tournament');
        $this->addSql('ALTER TABLE tournament DROP manager_id');
    }
}
