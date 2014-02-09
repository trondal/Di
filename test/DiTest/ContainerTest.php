<?php

namespace DiTest;

class ContainerTest extends \PHPUnit_Framework_TestCase {

    protected $di;

    public function setUp() {
        $this->di = new \Di\Container();
    }

    /**
     * @test
     */
    public function canAccessContainer() {
        $this->assertInstanceOf('Di\Container', new \Di\Container());
    }

    /**
     * @test
     */
    public function canGetSimpleClass() {
        $this->di->set('DiAssets\Entity\Telephone');

        $telephone = $this->di->get('DiAssets\Entity\Telephone');
        $this->assertInstanceOf('DiAssets\Entity\Telephone', $telephone);
    }

    /**
     * @test
     */
    public function canGetClassWithSetParameters() {
        $this->di->set('DiAssets\Db\Database', array(
            'dbname' => 'testdb',
            'username' => 'alice',
            'password' => 'jones'
        ));

        $db = $this->di->get('DiAssets\Db\Database');

        $this->assertInstanceOf('DiAssets\Db\Database', $db);
        $this->assertEquals('alice', $db->getOption('username'));
    }

    /**
     * @test
     */
    public function canGetClassWithOptions() {
        $this->di->set('DiAssets\Db\Database');

        $db = $this->di->get('DiAssets\Db\Database', array(
            'dbname' => 'testdb',
            'username' => 'bob',
            'password' => 'wicked')
        );

        $this->assertInstanceOf('DiAssets\Db\Database', $db);
        $this->assertEquals('bob', $db->getOption('username'));
    }

    /**
     * @test
     * @expectedException \Exception
     * @expectedExceptionMessage Class 'DiAssets\Entity\Foo' not configured by \Di\Container
     */
    public function containerThrowsExceptionWhenNotFindingClass() {
        $this->di->get('DiAssets\Entity\Foo');
    }

}
