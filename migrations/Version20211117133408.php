<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211117133408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, id_cat_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, prix DOUBLE PRECISION NOT NULL, frais_de_port DOUBLE PRECISION NOT NULL, quantite INT NOT NULL, origine VARCHAR(255) NOT NULL, note DOUBLE PRECISION NOT NULL, INDEX IDX_23A0E66C09A1CAE (id_cat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, cat_parent_id INT DEFAULT NULL, name_cat VARCHAR(255) NOT NULL, INDEX IDX_497DD6349D2DF21F (cat_parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66C09A1CAE FOREIGN KEY (id_cat_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD6349D2DF21F FOREIGN KEY (cat_parent_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66C09A1CAE');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD6349D2DF21F');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE categorie');
    }
}
