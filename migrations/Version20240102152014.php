<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240102152014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jumbotron DROP FOREIGN KEY FK_848C534AF8338EB6');
        $this->addSql('DROP INDEX UNIQ_848C534AF8338EB6 ON jumbotron');
        $this->addSql('ALTER TABLE jumbotron CHANGE picture_jumbotron_id_id picture_jumbotron_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jumbotron ADD CONSTRAINT FK_848C534A5749F7B9 FOREIGN KEY (picture_jumbotron_id) REFERENCES pictures_jumbotron (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_848C534A5749F7B9 ON jumbotron (picture_jumbotron_id)');
        $this->addSql('ALTER TABLE newsletter DROP FOREIGN KEY FK_7E8585C8D22BAF40');
        $this->addSql('DROP INDEX UNIQ_7E8585C8D22BAF40 ON newsletter');
        $this->addSql('ALTER TABLE newsletter CHANGE banner_id_id banner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE newsletter ADD CONSTRAINT FK_7E8585C8684EC833 FOREIGN KEY (banner_id) REFERENCES banner_newsletter (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7E8585C8684EC833 ON newsletter (banner_id)');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEE5BB3F5C');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE9D86650F');
        $this->addSql('DROP INDEX IDX_E52FFDEE9D86650F ON orders');
        $this->addSql('DROP INDEX IDX_E52FFDEEE5BB3F5C ON orders');
        $this->addSql('ALTER TABLE orders ADD user_id INT DEFAULT NULL, ADD orders_details_id INT DEFAULT NULL, DROP user_id_id, DROP orders_details_id_id');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEDED81EA5 FOREIGN KEY (orders_details_id) REFERENCES orders_details (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEEA76ED395 ON orders (user_id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEEDED81EA5 ON orders (orders_details_id)');
        $this->addSql('ALTER TABLE pictures_newsletter DROP FOREIGN KEY FK_9EBDA62AF529D2A3');
        $this->addSql('DROP INDEX IDX_9EBDA62AF529D2A3 ON pictures_newsletter');
        $this->addSql('ALTER TABLE pictures_newsletter CHANGE newsletter_id_id newsletter_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pictures_newsletter ADD CONSTRAINT FK_9EBDA62A22DB1917 FOREIGN KEY (newsletter_id) REFERENCES newsletter (id)');
        $this->addSql('CREATE INDEX IDX_9EBDA62A22DB1917 ON pictures_newsletter (newsletter_id)');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A9777D11E');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AC2428192');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A4D18FAD3');
        $this->addSql('DROP INDEX IDX_B3BA5A5A4D18FAD3 ON products');
        $this->addSql('DROP INDEX IDX_B3BA5A5A9777D11E ON products');
        $this->addSql('DROP INDEX IDX_B3BA5A5AC2428192 ON products');
        $this->addSql('ALTER TABLE products ADD platform_id INT DEFAULT NULL, ADD category_id INT DEFAULT NULL, ADD genre_id INT DEFAULT NULL, DROP platform_id_id, DROP category_id_id, DROP genre_id_id');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AFFE6496F FOREIGN KEY (platform_id) REFERENCES platforms_products (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A12469DE2 FOREIGN KEY (category_id) REFERENCES categorys_products (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A4296D31F FOREIGN KEY (genre_id) REFERENCES genres_products (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5AFFE6496F ON products (platform_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A12469DE2 ON products (category_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A4296D31F ON products (genre_id)');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9F529D2A3');
        $this->addSql('DROP INDEX IDX_1483A5E9F529D2A3 ON users');
        $this->addSql('ALTER TABLE users CHANGE newsletter_id_id newsletter_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E922DB1917 FOREIGN KEY (newsletter_id) REFERENCES newsletter (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E922DB1917 ON users (newsletter_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pictures_newsletter DROP FOREIGN KEY FK_9EBDA62A22DB1917');
        $this->addSql('DROP INDEX IDX_9EBDA62A22DB1917 ON pictures_newsletter');
        $this->addSql('ALTER TABLE pictures_newsletter CHANGE newsletter_id newsletter_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pictures_newsletter ADD CONSTRAINT FK_9EBDA62AF529D2A3 FOREIGN KEY (newsletter_id_id) REFERENCES newsletter (id)');
        $this->addSql('CREATE INDEX IDX_9EBDA62AF529D2A3 ON pictures_newsletter (newsletter_id_id)');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA76ED395');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEDED81EA5');
        $this->addSql('DROP INDEX IDX_E52FFDEEA76ED395 ON orders');
        $this->addSql('DROP INDEX IDX_E52FFDEEDED81EA5 ON orders');
        $this->addSql('ALTER TABLE orders ADD user_id_id INT DEFAULT NULL, ADD orders_details_id_id INT DEFAULT NULL, DROP user_id, DROP orders_details_id');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEE5BB3F5C FOREIGN KEY (orders_details_id_id) REFERENCES orders_details (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE9D86650F FOREIGN KEY (user_id_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE9D86650F ON orders (user_id_id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEEE5BB3F5C ON orders (orders_details_id_id)');
        $this->addSql('ALTER TABLE jumbotron DROP FOREIGN KEY FK_848C534A5749F7B9');
        $this->addSql('DROP INDEX UNIQ_848C534A5749F7B9 ON jumbotron');
        $this->addSql('ALTER TABLE jumbotron CHANGE picture_jumbotron_id picture_jumbotron_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE jumbotron ADD CONSTRAINT FK_848C534AF8338EB6 FOREIGN KEY (picture_jumbotron_id_id) REFERENCES pictures_jumbotron (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_848C534AF8338EB6 ON jumbotron (picture_jumbotron_id_id)');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AFFE6496F');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A12469DE2');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A4296D31F');
        $this->addSql('DROP INDEX IDX_B3BA5A5AFFE6496F ON products');
        $this->addSql('DROP INDEX IDX_B3BA5A5A12469DE2 ON products');
        $this->addSql('DROP INDEX IDX_B3BA5A5A4296D31F ON products');
        $this->addSql('ALTER TABLE products ADD platform_id_id INT DEFAULT NULL, ADD category_id_id INT DEFAULT NULL, ADD genre_id_id INT DEFAULT NULL, DROP platform_id, DROP category_id, DROP genre_id');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A9777D11E FOREIGN KEY (category_id_id) REFERENCES categorys_products (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AC2428192 FOREIGN KEY (genre_id_id) REFERENCES genres_products (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A4D18FAD3 FOREIGN KEY (platform_id_id) REFERENCES platforms_products (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A4D18FAD3 ON products (platform_id_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A9777D11E ON products (category_id_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5AC2428192 ON products (genre_id_id)');
        $this->addSql('ALTER TABLE newsletter DROP FOREIGN KEY FK_7E8585C8684EC833');
        $this->addSql('DROP INDEX UNIQ_7E8585C8684EC833 ON newsletter');
        $this->addSql('ALTER TABLE newsletter CHANGE banner_id banner_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE newsletter ADD CONSTRAINT FK_7E8585C8D22BAF40 FOREIGN KEY (banner_id_id) REFERENCES banner_newsletter (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7E8585C8D22BAF40 ON newsletter (banner_id_id)');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E922DB1917');
        $this->addSql('DROP INDEX IDX_1483A5E922DB1917 ON users');
        $this->addSql('ALTER TABLE users CHANGE newsletter_id newsletter_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9F529D2A3 FOREIGN KEY (newsletter_id_id) REFERENCES newsletter (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9F529D2A3 ON users (newsletter_id_id)');
    }
}
