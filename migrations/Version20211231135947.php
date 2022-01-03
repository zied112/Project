<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211231135947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE centre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE don (id INT AUTO_INCREMENT NOT NULL, centre_id INT DEFAULT NULL, groupe VARCHAR(255) NOT NULL, INDEX IDX_F8F081D9463CD7C3 (centre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donneur (id INT AUTO_INCREMENT NOT NULL, don_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, cin INT NOT NULL, telephone INT NOT NULL, adresse VARCHAR(255) NOT NULL, age INT NOT NULL, UNIQUE INDEX UNIQ_4493D7737B3C9061 (don_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operateur (id INT AUTO_INCREMENT NOT NULL, donneur_id INT DEFAULT NULL, centre_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, cin INT NOT NULL, telephone INT NOT NULL, UNIQUE INDEX UNIQ_B4B7F99D9789825B (donneur_id), INDEX IDX_B4B7F99D463CD7C3 (centre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT FK_F8F081D9463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id)');
        $this->addSql('ALTER TABLE donneur ADD CONSTRAINT FK_4493D7737B3C9061 FOREIGN KEY (don_id) REFERENCES don (id)');
        $this->addSql('ALTER TABLE operateur ADD CONSTRAINT FK_B4B7F99D9789825B FOREIGN KEY (donneur_id) REFERENCES donneur (id)');
        $this->addSql('ALTER TABLE operateur ADD CONSTRAINT FK_B4B7F99D463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY FK_F8F081D9463CD7C3');
        $this->addSql('ALTER TABLE operateur DROP FOREIGN KEY FK_B4B7F99D463CD7C3');
        $this->addSql('ALTER TABLE donneur DROP FOREIGN KEY FK_4493D7737B3C9061');
        $this->addSql('ALTER TABLE operateur DROP FOREIGN KEY FK_B4B7F99D9789825B');
        $this->addSql('DROP TABLE centre');
        $this->addSql('DROP TABLE don');
        $this->addSql('DROP TABLE donneur');
        $this->addSql('DROP TABLE operateur');
    }
}
