<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230608152540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE forum_message (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, trick_id INT NOT NULL, content LONGTEXT NOT NULL, date_dreated DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, status VARCHAR(10) NOT NULL, INDEX IDX_47717D0EA76ED395 (user_id), INDEX IDX_47717D0EB281BE2E (trick_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trick (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, category_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, slug VARCHAR(255) NOT NULL, excerpt VARCHAR(100) DEFAULT NULL, content VARCHAR(10000) NOT NULL, date_created DATETIME NOT NULL, date_modified DATETIME DEFAULT NULL, status VARCHAR(10) NOT NULL, INDEX IDX_D8F0A91EA76ED395 (user_id), INDEX IDX_D8F0A91E12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trick_category (id INT AUTO_INCREMENT NOT NULL, feat_img_file_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(1000) DEFAULT NULL, UNIQUE INDEX UNIQ_639F9D7E67816506 (feat_img_file_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE forum_message ADD CONSTRAINT FK_47717D0EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE forum_message ADD CONSTRAINT FK_47717D0EB281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id)');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91E12469DE2 FOREIGN KEY (category_id) REFERENCES trick_category (id)');
        $this->addSql('ALTER TABLE trick_category ADD CONSTRAINT FK_639F9D7E67816506 FOREIGN KEY (feat_img_file_id) REFERENCES file (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE forum_message DROP FOREIGN KEY FK_47717D0EA76ED395');
        $this->addSql('ALTER TABLE forum_message DROP FOREIGN KEY FK_47717D0EB281BE2E');
        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91EA76ED395');
        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91E12469DE2');
        $this->addSql('ALTER TABLE trick_category DROP FOREIGN KEY FK_639F9D7E67816506');
        $this->addSql('DROP TABLE forum_message');
        $this->addSql('DROP TABLE trick');
        $this->addSql('DROP TABLE trick_category');
    }
}
