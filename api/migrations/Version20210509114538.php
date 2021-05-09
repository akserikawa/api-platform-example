<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210509114538 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bikes (id UUID NOT NULL, brand_id UUID NOT NULL, model VARCHAR(255) NOT NULL, year VARCHAR(4) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F6FAF01C44F5D008 ON bikes (brand_id)');
        $this->addSql('COMMENT ON COLUMN bikes.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN bikes.brand_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE brands (id UUID NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN brands.id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE bikes ADD CONSTRAINT FK_F6FAF01C44F5D008 FOREIGN KEY (brand_id) REFERENCES brands (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE bikes DROP CONSTRAINT FK_F6FAF01C44F5D008');
        $this->addSql('DROP TABLE bikes');
        $this->addSql('DROP TABLE brands');
    }
}
