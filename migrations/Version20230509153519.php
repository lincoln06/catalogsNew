<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230509153519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE catalogs ADD producer_id INT NOT NULL');
        $this->addSql('ALTER TABLE catalogs ADD CONSTRAINT FK_F3AD370A89B658FE FOREIGN KEY (producer_id) REFERENCES producer (id)');
        $this->addSql('CREATE INDEX IDX_F3AD370A89B658FE ON catalogs (producer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE catalogs DROP FOREIGN KEY FK_F3AD370A89B658FE');
        $this->addSql('DROP INDEX IDX_F3AD370A89B658FE ON catalogs');
        $this->addSql('ALTER TABLE catalogs DROP producer_id');
    }
}
