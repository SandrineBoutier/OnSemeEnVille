<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220203020219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blogpost_tag (blogpost_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_C270660E27F5416E (blogpost_id), INDEX IDX_C270660EBAD26311 (tag_id), PRIMARY KEY(blogpost_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE blogpost_category (blogpost_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_B9261D4E27F5416E (blogpost_id), INDEX IDX_B9261D4E12469DE2 (category_id), PRIMARY KEY(blogpost_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blogpost_tag ADD CONSTRAINT FK_C270660E27F5416E FOREIGN KEY (blogpost_id) REFERENCES blogpost (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blogpost_tag ADD CONSTRAINT FK_C270660EBAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blogpost_category ADD CONSTRAINT FK_B9261D4E27F5416E FOREIGN KEY (blogpost_id) REFERENCES blogpost (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE blogpost_category ADD CONSTRAINT FK_B9261D4E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE blogpost_tag');
        $this->addSql('DROP TABLE blogpost_category');
        $this->addSql('ALTER TABLE blogpost CHANGE title title VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE content content LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE comment CHANGE content content LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE pseudo pseudo VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE photo CHANGE url url VARCHAR(255) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE tag CHANGE tag tag VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
