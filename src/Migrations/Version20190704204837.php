<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190704204837 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adherent (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, name VARCHAR(55) NOT NULL, first_name VARCHAR(55) NOT NULL, address VARCHAR(255) NOT NULL, phone_number INT NOT NULL, email_address VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, INDEX IDX_90D3F060D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compte_rendu (id INT AUTO_INCREMENT NOT NULL, adherent_id INT NOT NULL, date DATETIME NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_D39E69D225F06C53 (adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cotisation (id INT AUTO_INCREMENT NOT NULL, adherent_id INT NOT NULL, date DATETIME NOT NULL, INDEX IDX_AE64D2ED25F06C53 (adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(55) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F060D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE compte_rendu ADD CONSTRAINT FK_D39E69D225F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE cotisation ADD CONSTRAINT FK_AE64D2ED25F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE compte_rendu DROP FOREIGN KEY FK_D39E69D225F06C53');
        $this->addSql('ALTER TABLE cotisation DROP FOREIGN KEY FK_AE64D2ED25F06C53');
        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F060D60322AC');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE compte_rendu');
        $this->addSql('DROP TABLE cotisation');
        $this->addSql('DROP TABLE role');
    }
}
