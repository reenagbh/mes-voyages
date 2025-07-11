<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250616231401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE visite_environnement (visite_id INT NOT NULL, environnement_id INT NOT NULL, INDEX IDX_6690F746C1C5DC59 (visite_id), INDEX IDX_6690F746BAFB82A1 (environnement_id), PRIMARY KEY(visite_id, environnement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE visite_environnement ADD CONSTRAINT FK_6690F746C1C5DC59 FOREIGN KEY (visite_id) REFERENCES visite (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE visite_environnement ADD CONSTRAINT FK_6690F746BAFB82A1 FOREIGN KEY (environnement_id) REFERENCES environnement (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE visite_environnement DROP FOREIGN KEY FK_6690F746C1C5DC59
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE visite_environnement DROP FOREIGN KEY FK_6690F746BAFB82A1
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE visite_environnement
        SQL);
    }
}
