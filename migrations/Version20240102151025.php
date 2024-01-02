<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240102151025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE banner_newsletter (id INT AUTO_INCREMENT NOT NULL, banner_name VARCHAR(255) NOT NULL, banner_file VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorys_products (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coupons (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, discount INT NOT NULL, validity DATETIME NOT NULL, is_valid TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genres_products (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jumbotron (id INT AUTO_INCREMENT NOT NULL, picture_jumbotron_id_id INT DEFAULT NULL, title VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', is_publish TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_848C534AF8338EB6 (picture_jumbotron_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newsletter (id INT AUTO_INCREMENT NOT NULL, banner_id_id INT DEFAULT NULL, main_title VARCHAR(255) NOT NULL, secondary_title VARCHAR(255) NOT NULL, second_text LONGTEXT NOT NULL, third_title VARCHAR(255) DEFAULT NULL, third_text LONGTEXT DEFAULT NULL, fourth_title VARCHAR(255) DEFAULT NULL, fourth_text LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_7E8585C8D22BAF40 (banner_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, coupon_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, orders_details_id_id INT DEFAULT NULL, reference VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E52FFDEE66C5951B (coupon_id), INDEX IDX_E52FFDEE9D86650F (user_id_id), INDEX IDX_E52FFDEEE5BB3F5C (orders_details_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders_details (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, total_price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pictures_jumbotron (id INT AUTO_INCREMENT NOT NULL, picture_name VARCHAR(255) NOT NULL, picture_file VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pictures_newsletter (id INT AUTO_INCREMENT NOT NULL, newsletter_id_id INT DEFAULT NULL, picture_name VARCHAR(255) NOT NULL, picture_file VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_9EBDA62AF529D2A3 (newsletter_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pictures_products (id INT AUTO_INCREMENT NOT NULL, products_id_id INT DEFAULT NULL, picture_name VARCHAR(255) NOT NULL, picture_file VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_C1C570DA9F1D6087 (products_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE platforms_products (id INT AUTO_INCREMENT NOT NULL, platform VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, platform_id_id INT DEFAULT NULL, category_id_id INT DEFAULT NULL, genre_id_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, stock INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B3BA5A5A4D18FAD3 (platform_id_id), INDEX IDX_B3BA5A5A9777D11E (category_id_id), INDEX IDX_B3BA5A5AC2428192 (genre_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, newsletter_id_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, date_of_birth DATE NOT NULL, address VARCHAR(255) NOT NULL, zipcode VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, is_valid TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), INDEX IDX_1483A5E9F529D2A3 (newsletter_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jumbotron ADD CONSTRAINT FK_848C534AF8338EB6 FOREIGN KEY (picture_jumbotron_id_id) REFERENCES pictures_jumbotron (id)');
        $this->addSql('ALTER TABLE newsletter ADD CONSTRAINT FK_7E8585C8D22BAF40 FOREIGN KEY (banner_id_id) REFERENCES banner_newsletter (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE66C5951B FOREIGN KEY (coupon_id) REFERENCES coupons (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEE5BB3F5C FOREIGN KEY (orders_details_id_id) REFERENCES orders_details (id)');
        $this->addSql('ALTER TABLE pictures_newsletter ADD CONSTRAINT FK_9EBDA62AF529D2A3 FOREIGN KEY (newsletter_id_id) REFERENCES newsletter (id)');
        $this->addSql('ALTER TABLE pictures_products ADD CONSTRAINT FK_C1C570DA9F1D6087 FOREIGN KEY (products_id_id) REFERENCES products (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A4D18FAD3 FOREIGN KEY (platform_id_id) REFERENCES platforms_products (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A9777D11E FOREIGN KEY (category_id_id) REFERENCES categorys_products (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AC2428192 FOREIGN KEY (genre_id_id) REFERENCES genres_products (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9F529D2A3 FOREIGN KEY (newsletter_id_id) REFERENCES newsletter (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jumbotron DROP FOREIGN KEY FK_848C534AF8338EB6');
        $this->addSql('ALTER TABLE newsletter DROP FOREIGN KEY FK_7E8585C8D22BAF40');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE66C5951B');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE9D86650F');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEE5BB3F5C');
        $this->addSql('ALTER TABLE pictures_newsletter DROP FOREIGN KEY FK_9EBDA62AF529D2A3');
        $this->addSql('ALTER TABLE pictures_products DROP FOREIGN KEY FK_C1C570DA9F1D6087');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A4D18FAD3');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A9777D11E');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AC2428192');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9F529D2A3');
        $this->addSql('DROP TABLE banner_newsletter');
        $this->addSql('DROP TABLE categorys_products');
        $this->addSql('DROP TABLE coupons');
        $this->addSql('DROP TABLE genres_products');
        $this->addSql('DROP TABLE jumbotron');
        $this->addSql('DROP TABLE newsletter');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE orders_details');
        $this->addSql('DROP TABLE pictures_jumbotron');
        $this->addSql('DROP TABLE pictures_newsletter');
        $this->addSql('DROP TABLE pictures_products');
        $this->addSql('DROP TABLE platforms_products');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
