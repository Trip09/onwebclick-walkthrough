<?php
namespace IgniteYourProject\Base\MovieBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ModelTestCase extends KernelTestCase
{
    protected $_application;

    public function getContainer()
    {
        return $this->application->getKernel()->getContainer();
    }

    /**
     * @inheritDoc
     */
    public function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->_application = new \Symfony\Bundle\FrameworkBundle\Console\Application(static::$kernel);
        $this->_application->setAutoExit(false);
        $this->runConsole("doctrine:schema:drop", array("--force" => true));
        $this->runConsole("doctrine:schema:create");
        $this->runConsole("doctrine:fixtures:load", array("--fixtures" => __DIR__ . "/../DataFixtures"));
    }

    protected function runConsole($command, Array $options = array())
    {
        $options["--env"] = "test";
        $options = array_merge($options, array('command' => $command));

        return $this->_application->run(new \Symfony\Component\Console\Input\ArrayInput($options));
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();
        $this->em->close();
    }
}