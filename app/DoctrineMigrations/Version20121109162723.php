<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20121109162723 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE updates DROP FOREIGN KEY FK_45481330D596EAB1");
        $this->addSql("DROP INDEX IDX_45481330D596EAB1 ON updates");
        $this->addSql("ALTER TABLE updates CHANGE update_id user_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE updates ADD CONSTRAINT FK_45481330A76ED395 FOREIGN KEY (user_id) REFERENCES phpbb_user (id)");
        $this->addSql("CREATE INDEX IDX_45481330A76ED395 ON updates (user_id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("ALTER TABLE updates DROP FOREIGN KEY FK_45481330A76ED395");
        $this->addSql("DROP INDEX IDX_45481330A76ED395 ON updates");
        $this->addSql("ALTER TABLE updates CHANGE user_id update_id INT DEFAULT NULL");
        $this->addSql("ALTER TABLE updates ADD CONSTRAINT FK_45481330D596EAB1 FOREIGN KEY (update_id) REFERENCES phpbb_user (id)");
        $this->addSql("CREATE INDEX IDX_45481330D596EAB1 ON updates (update_id)");
    }
}