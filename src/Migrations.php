<?php namespace VamosColar\ManagerMigrations;


class Migrations
{


    protected $caminho;


    public function getCaminho()
    {
        return $this->caminho;
    }

    public function setCaminho($caminho)
    {
        $this->caminho = $caminho;

        return $this;
    }

    public function setClassMigrationName($migrationName)
    {
        return $this;
    }

    public function getClassMigrationName()
    {
        return 'Migrations';
    }

}