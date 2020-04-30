<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200429085609 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product ADD order_item_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADE415FB15 FOREIGN KEY (order_item_id) REFERENCES order_item (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04ADE415FB15 ON product (order_item_id)');
        $this->addSql('ALTER TABLE order_item DROP FOREIGN KEY FK_52EA1F096C8A81A9');
        $this->addSql('DROP INDEX IDX_52EA1F096C8A81A9 ON order_item');
        $this->addSql('ALTER TABLE order_item DROP products_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE order_item ADD products_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F096C8A81A9 FOREIGN KEY (products_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_52EA1F096C8A81A9 ON order_item (products_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADE415FB15');
        $this->addSql('DROP INDEX UNIQ_D34A04ADE415FB15 ON product');
        $this->addSql('ALTER TABLE product DROP order_item_id');
    }
}
