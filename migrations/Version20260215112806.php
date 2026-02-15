<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260215112806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clase (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nombre VARCHAR(150) NOT NULL, tipo VARCHAR(100) NOT NULL, hora TIME NOT NULL, capacidad_maxima INTEGER NOT NULL, fecha DATE NOT NULL, entrenador_id INTEGER NOT NULL, CONSTRAINT FK_199FACCE4FE90CDB FOREIGN KEY (entrenador_id) REFERENCES entrenador (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_199FACCE4FE90CDB ON clase (entrenador_id)');
        $this->addSql('CREATE TABLE entrenador (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, especialidad VARCHAR(100) NOT NULL, email VARCHAR(150) NOT NULL, experiencia_anios INTEGER NOT NULL, telefono VARCHAR(20) NOT NULL)');
        $this->addSql('CREATE TABLE inscripcion (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, fecha_inscripcion DATE NOT NULL, estado VARCHAR(50) NOT NULL, socio_id INTEGER NOT NULL, clase_id INTEGER NOT NULL, CONSTRAINT FK_935E99F0DA04E6A9 FOREIGN KEY (socio_id) REFERENCES socio (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_935E99F09F720353 FOREIGN KEY (clase_id) REFERENCES clase (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_935E99F0DA04E6A9 ON inscripcion (socio_id)');
        $this->addSql('CREATE INDEX IDX_935E99F09F720353 ON inscripcion (clase_id)');
        $this->addSql('CREATE TABLE socio (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nombre VARCHAR(100) NOT NULL, apellido VARCHAR(100) NOT NULL, email VARCHAR(150) NOT NULL, edad INTEGER NOT NULL, telefono VARCHAR(20) NOT NULL, fecha_alta DATE NOT NULL, tipo_membresia VARCHAR(50) NOT NULL, pedro VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE usuario (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles CLOB NOT NULL, password VARCHAR(255) NOT NULL, nombre VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2265B05DE7927C74 ON usuario (email)');
        $this->addSql('CREATE TABLE messenger_messages (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, body CLOB NOT NULL, headers CLOB NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 ON messenger_messages (queue_name, available_at, delivered_at, id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE clase');
        $this->addSql('DROP TABLE entrenador');
        $this->addSql('DROP TABLE inscripcion');
        $this->addSql('DROP TABLE socio');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
