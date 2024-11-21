<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241116003427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assunto (codAs INT AUTO_INCREMENT NOT NULL, Descricao VARCHAR(20) NOT NULL, PRIMARY KEY(codAs)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE autor (codAu INT AUTO_INCREMENT NOT NULL, Nome VARCHAR(40) NOT NULL, PRIMARY KEY(codAu)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livro (codl INT AUTO_INCREMENT NOT NULL, Titulo VARCHAR(40) NOT NULL, Editora VARCHAR(40) DEFAULT NULL, Edicao INT DEFAULT NULL, AnoPublicacao VARCHAR(4) DEFAULT NULL, valor NUMERIC(10, 2) DEFAULT NULL, PRIMARY KEY(codl)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livro_autor (Livro_Codl INT NOT NULL, Autor_CodAu INT NOT NULL, INDEX IDX_67499924A5AFC39 (Livro_Codl), INDEX IDX_6749992B44F3F36 (Autor_CodAu), PRIMARY KEY(Livro_Codl, Autor_CodAu)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livro_assunto (Livro_Codl INT NOT NULL, Assunto_CodAs INT NOT NULL, INDEX IDX_53C2C52A4A5AFC39 (Livro_Codl), INDEX IDX_53C2C52A64209C06 (Assunto_CodAs), PRIMARY KEY(Livro_Codl, Assunto_CodAs)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE livro_autor ADD CONSTRAINT FK_67499924A5AFC39 FOREIGN KEY (Livro_Codl) REFERENCES livro (codl)');
        $this->addSql('ALTER TABLE livro_autor ADD CONSTRAINT FK_6749992B44F3F36 FOREIGN KEY (Autor_CodAu) REFERENCES autor (codAu)');
        $this->addSql('ALTER TABLE livro_assunto ADD CONSTRAINT FK_53C2C52A4A5AFC39 FOREIGN KEY (Livro_Codl) REFERENCES livro (codl)');
        $this->addSql('ALTER TABLE livro_assunto ADD CONSTRAINT FK_53C2C52A64209C06 FOREIGN KEY (Assunto_CodAs) REFERENCES assunto (codAs)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livro_autor DROP FOREIGN KEY FK_67499924A5AFC39');
        $this->addSql('ALTER TABLE livro_autor DROP FOREIGN KEY FK_6749992B44F3F36');
        $this->addSql('ALTER TABLE livro_assunto DROP FOREIGN KEY FK_53C2C52A4A5AFC39');
        $this->addSql('ALTER TABLE livro_assunto DROP FOREIGN KEY FK_53C2C52A64209C06');
        $this->addSql('DROP TABLE assunto');
        $this->addSql('DROP TABLE autor');
        $this->addSql('DROP TABLE livro');
        $this->addSql('DROP TABLE livro_autor');
        $this->addSql('DROP TABLE livro_assunto');
    }
}
