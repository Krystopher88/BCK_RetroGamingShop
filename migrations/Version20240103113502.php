<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240103113502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jumbotron DROP FOREIGN KEY FK_848C534A5749F7B9');
        $this->addSql('DROP TABLE pictures_jumbotron');
        $this->addSql('DROP INDEX UNIQ_848C534A5749F7B9 ON jumbotron');
        $this->addSql('ALTER TABLE jumbotron ADD picture_name VARCHAR(255) NOT NULL, ADD picture_file VARCHAR(255) NOT NULL, DROP picture_jumbotron_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE pictures_jumbotron (id INT AUTO_INCREMENT NOT NULL, picture_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, picture_file VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE jumbotron ADD picture_jumbotron_id INT DEFAULT NULL, DROP picture_name, DROP picture_file');
        $this->addSql('ALTER TABLE jumbotron ADD CONSTRAINT FK_848C534A5749F7B9 FOREIGN KEY (picture_jumbotron_id) REFERENCES pictures_jumbotron (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_848C534A5749F7B9 ON jumbotron (picture_jumbotron_id)');
    }
}
