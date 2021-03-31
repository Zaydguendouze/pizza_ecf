<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210331113947 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bases (id INT AUTO_INCREMENT NOT NULL, base_name VARCHAR(10) NOT NULL, base_price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredients (id INT AUTO_INCREMENT NOT NULL, ingredient_name VARCHAR(40) NOT NULL, ingredient_price DOUBLE PRECISION NOT NULL, vegetarian TINYINT(1) NOT NULL, vegan TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pizzas (id INT AUTO_INCREMENT NOT NULL, pizza_base_id INT NOT NULL, pizza_size_id INT NOT NULL, pizza_name VARCHAR(30) NOT NULL, INDEX IDX_C6CC6E40CE88070B (pizza_base_id), INDEX IDX_C6CC6E40EE62706D (pizza_size_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pizza_ingredient (pizza_id INT NOT NULL, ingredient_id INT NOT NULL, INDEX IDX_6FF6C03FD41D1D42 (pizza_id), INDEX IDX_6FF6C03F933FE08C (ingredient_id), PRIMARY KEY(pizza_id, ingredient_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sizes (id INT AUTO_INCREMENT NOT NULL, size_name VARCHAR(10) NOT NULL, size_price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pizzas ADD CONSTRAINT FK_C6CC6E40CE88070B FOREIGN KEY (pizza_base_id) REFERENCES bases (id)');
        $this->addSql('ALTER TABLE pizzas ADD CONSTRAINT FK_C6CC6E40EE62706D FOREIGN KEY (pizza_size_id) REFERENCES sizes (id)');
        $this->addSql('ALTER TABLE pizza_ingredient ADD CONSTRAINT FK_6FF6C03FD41D1D42 FOREIGN KEY (pizza_id) REFERENCES pizzas (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pizza_ingredient ADD CONSTRAINT FK_6FF6C03F933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredients (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pizzas DROP FOREIGN KEY FK_C6CC6E40CE88070B');
        $this->addSql('ALTER TABLE pizza_ingredient DROP FOREIGN KEY FK_6FF6C03F933FE08C');
        $this->addSql('ALTER TABLE pizza_ingredient DROP FOREIGN KEY FK_6FF6C03FD41D1D42');
        $this->addSql('ALTER TABLE pizzas DROP FOREIGN KEY FK_C6CC6E40EE62706D');
        $this->addSql('DROP TABLE bases');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('DROP TABLE pizzas');
        $this->addSql('DROP TABLE pizza_ingredient');
        $this->addSql('DROP TABLE sizes');
    }
}
