<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220102114528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donneur DROP INDEX UNIQ_4493D7737B3C9061, ADD INDEX IDX_4493D7737B3C9061 (don_id)');
        $this->addSql('ALTER TABLE donneur ADD operateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE donneur ADD CONSTRAINT FK_4493D7733F192FC FOREIGN KEY (operateur_id) REFERENCES operateur (id)');
        $this->addSql('CREATE INDEX IDX_4493D7733F192FC ON donneur (operateur_id)');
        $this->addSql('ALTER TABLE operateur DROP FOREIGN KEY FK_B4B7F99D9789825B');
        $this->addSql('DROP INDEX UNIQ_B4B7F99D9789825B ON operateur');
        $this->addSql('ALTER TABLE operateur DROP donneur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donneur DROP INDEX IDX_4493D7737B3C9061, ADD UNIQUE INDEX UNIQ_4493D7737B3C9061 (don_id)');
        $this->addSql('ALTER TABLE donneur DROP FOREIGN KEY FK_4493D7733F192FC');
        $this->addSql('DROP INDEX IDX_4493D7733F192FC ON donneur');
        $this->addSql('ALTER TABLE donneur DROP operateur_id');
        $this->addSql('ALTER TABLE operateur ADD donneur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operateur ADD CONSTRAINT FK_B4B7F99D9789825B FOREIGN KEY (donneur_id) REFERENCES donneur (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B4B7F99D9789825B ON operateur (donneur_id)');
    }
}
