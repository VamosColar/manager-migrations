<?php namespace VamosColar\ManagerMigrations;

class MigrationsTest extends \PHPUnit_Framework_TestCase
{

    protected function assertPreConditions()
    {

        $class = "VamosColar\ManagerMigrations\Migrations";

        $this->assertTrue(class_exists($class));

    }


    /**
     * @test
     */
    public function DeveRetornaErroCasoNaoTenhaConfiguradoCaminhoDasMigrations()
    {

        $migrations = new Migrations();

        $migrations->setCaminho('./migrations');

        $valor = $migrations->getCaminho();

        $this->assertEquals('./migrations', $valor, 'Caminho não configurado');

    }

    public function testDeveRetornarErroCasoPastaNaoExista()
    {
        $migrations = new Migrations();

        $caminho = './migration';

        $objetoRetorno = $migrations->setCaminho($caminho);

        $this->assertEquals($migrations, $objetoRetorno, 'API não está usando fluent interface');

        $this->assertEquals($caminho, $migrations->getCaminho(), 'Caminho não configurado');

        $this->assertAttributeEquals($caminho, 'caminho', $migrations, 'Valor não encontrado no atributo');
        
    }

    public function testDiretorioValido()
    {
        $migrations = new Migrations();

        $caminho = './migrations';

        $objetoRetorno = $migrations->setCaminho($caminho);

        $arquivo = is_dir($objetoRetorno->getCaminho());

        $this->assertTrue($arquivo, 'Arquivo não encontrado');
    }

    public function testArquivoDentroDeUmDiretorio()
    {
        $migrations = new Migrations();

        $caminho = './migrations';

        $objetoRetorno = $migrations->setCaminho($caminho);

        $arquivos = scandir($objetoRetorno->getCaminho());

        $this->assertTrue(count($arquivos) > 2, 'Não existe nenhum arquivo');
    }

    public function testClasseMigrationsConfigurada()
    {
        $migrations = new Migrations();

        $migrations->setClassMigrationName('Migration');

        $valor = $migrations->getClassMigrationName();

        $this->assertEquals('Migration', $valor, 'Nome da Classe da Migration não configurado');
    }

}