<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240104114439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE newsletter DROP FOREIGN KEY FK_7E8585C8684EC833');
        $this->addSql('ALTER TABLE pictures_newsletter DROP FOREIGN KEY FK_9EBDA62A22DB1917');
        $this->addSql('DROP TABLE pictures_newsletter');
        $this->addSql('DROP TABLE banner_newsletter');
        $this->addSql('DROP INDEX UNIQ_7E8585C8684EC833 ON newsletter');
        $this->addSql('ALTER TABLE newsletter ADD banner_name VARCHAR(255) NOT NULL, ADD picture_secondary_name VARCHAR(255) NOT NULL, ADD picture_third_name VARCHAR(255) NOT NULL, ADD picture_fourth_name VARCHAR(255) NOT NULL, DROP banner_id, CHANGE fourth_text fourth_text LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pictures_newsletter (id INT AUTO_INCREMENT NOT NULL, newsletter_id INT DEFAULT NULL, picture_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, picture_file VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_9EBDA62A22DB1917 (newsletter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE banner_newsletter (id INT AUTO_INCREMENT NOT NULL, banner_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, banner_file VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE pictures_newsletter ADD CONSTRAINT FK_9EBDA62A22DB1917 FOREIGN KEY (newsletter_id) REFERENCES newsletter (id)');
        $this->addSql('ALTER TABLE newsletter ADD banner_id INT DEFAULT NULL, DROP banner_name, DROP picture_secondary_name, DROP picture_third_name, DROP picture_fourth_name, CHANGE fourth_text fourth_text LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE newsletter ADD CONSTRAINT FK_7E8585C8684EC833 FOREIGN KEY (banner_id) REFERENCES banner_newsletter (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7E8585C8684EC833 ON newsletter (banner_id)');
    }
}
