<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210529202437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE directors (id UUID NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN directors.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE movies (id UUID NOT NULL, director_id UUID NOT NULL, title VARCHAR(255) NOT NULL, year VARCHAR(4) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C61EED30899FB366 ON movies (director_id)');
        $this->addSql('COMMENT ON COLUMN movies.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN movies.director_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE movies ADD CONSTRAINT FK_C61EED30899FB366 FOREIGN KEY (director_id) REFERENCES directors (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movies DROP CONSTRAINT FK_C61EED30899FB366');
        $this->addSql('DROP TABLE directors');
        $this->addSql('DROP TABLE movies');
    }
}
