<?php

namespace Inwicast\ClarolinePluginBundle\Migrations\mysqli;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated migration based on mapping information: modify it with caution
 *
 * Generation date: 2014/07/24 10:38:02
 */
class Version20140724103801 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql("
            CREATE TABLE inwicast_plugin_media (
                id INT AUTO_INCREMENT NOT NULL, 
                code VARCHAR(255) NOT NULL, 
                title VARCHAR(255) NOT NULL, 
                description LONGTEXT NOT NULL, 
                date DATE NOT NULL, 
                image VARCHAR(255) NOT NULL, 
                width INT NOT NULL, 
                height INT NOT NULL, 
                widgetInstance_id INT DEFAULT NULL, 
                resourceNode_id INT DEFAULT NULL, 
                INDEX IDX_ED925F02AB7B5A55 (widgetInstance_id), 
                UNIQUE INDEX UNIQ_ED925F02B87FAB32 (resourceNode_id), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE inwicast_plugin_mediacenter (
                id INT AUTO_INCREMENT NOT NULL, 
                url VARCHAR(255) NOT NULL, 
                resourceNode_id INT DEFAULT NULL, 
                UNIQUE INDEX UNIQ_10878E9B87FAB32 (resourceNode_id), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            CREATE TABLE inwicast_plugin_mediauser (
                id INT AUTO_INCREMENT NOT NULL, 
                user_id INT DEFAULT NULL, 
                username VARCHAR(255) NOT NULL, 
                resourceNode_id INT DEFAULT NULL, 
                UNIQUE INDEX UNIQ_DDB60112A76ED395 (user_id), 
                UNIQUE INDEX UNIQ_DDB60112B87FAB32 (resourceNode_id), 
                PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB
        ");
        $this->addSql("
            ALTER TABLE inwicast_plugin_media 
            ADD CONSTRAINT FK_ED925F02AB7B5A55 FOREIGN KEY (widgetInstance_id) 
            REFERENCES claro_widget_instance (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE inwicast_plugin_media 
            ADD CONSTRAINT FK_ED925F02B87FAB32 FOREIGN KEY (resourceNode_id) 
            REFERENCES claro_resource_node (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE inwicast_plugin_mediacenter 
            ADD CONSTRAINT FK_10878E9B87FAB32 FOREIGN KEY (resourceNode_id) 
            REFERENCES claro_resource_node (id) 
            ON DELETE CASCADE
        ");
        $this->addSql("
            ALTER TABLE inwicast_plugin_mediauser 
            ADD CONSTRAINT FK_DDB60112A76ED395 FOREIGN KEY (user_id) 
            REFERENCES claro_user (id)
        ");
        $this->addSql("
            ALTER TABLE inwicast_plugin_mediauser 
            ADD CONSTRAINT FK_DDB60112B87FAB32 FOREIGN KEY (resourceNode_id) 
            REFERENCES claro_resource_node (id) 
            ON DELETE CASCADE
        ");
    }

    public function down(Schema $schema)
    {
        $this->addSql("
            DROP TABLE inwicast_plugin_media
        ");
        $this->addSql("
            DROP TABLE inwicast_plugin_mediacenter
        ");
        $this->addSql("
            DROP TABLE inwicast_plugin_mediauser
        ");
    }
}