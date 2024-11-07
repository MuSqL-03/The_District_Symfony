<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241025083920 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D9A01C10');
        $this->addSql('DROP INDEX IDX_6EEAA67D9A01C10 ON commande');
        $this->addSql('ALTER TABLE commande ADD plat_id INT NOT NULL, DROP id_plat_id');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DD73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DD73DB560 ON commande (plat_id)');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A207BCF5E72D');
        $this->addSql('DROP INDEX IDX_2038A207BCF5E72D ON plat');
        $this->addSql('ALTER TABLE plat ADD id_categorie INT NOT NULL, DROP categorie_id');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A207C9486A13 FOREIGN KEY (id_categorie) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_2038A207C9486A13 ON plat (id_categorie)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DD73DB560');
        $this->addSql('DROP INDEX IDX_6EEAA67DD73DB560 ON commande');
        $this->addSql('ALTER TABLE commande ADD id_plat_id INT DEFAULT NULL, DROP plat_id');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D9A01C10 FOREIGN KEY (id_plat_id) REFERENCES plat (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D9A01C10 ON commande (id_plat_id)');
        $this->addSql('ALTER TABLE plat DROP FOREIGN KEY FK_2038A207C9486A13');
        $this->addSql('DROP INDEX IDX_2038A207C9486A13 ON plat');
        $this->addSql('ALTER TABLE plat ADD categorie_id INT DEFAULT NULL, DROP id_categorie');
        $this->addSql('ALTER TABLE plat ADD CONSTRAINT FK_2038A207BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_2038A207BCF5E72D ON plat (categorie_id)');
        $this->addSql('ALTER TABLE plat ADD id_categorie INT NOT NULL');
    }
}