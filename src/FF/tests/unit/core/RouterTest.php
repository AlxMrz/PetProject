<?php
declare(strict_types=1);

use FF\router\Router;
use FF\tests\unit\CommonTestCase;

final class RouterTest extends CommonTestCase
{
    /**
     * @var Router
     */
    private $router;

    public function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }

    public function testGettingArrayWithRoute(): void
    {

        $uri = "/mainpage/getList";
        $expectedData = [
            'controller' => 'MainpageController',
            'action' => 'actionGetList',
        ];
        $this->router->parseUri($uri);
        $this->assertEquals($expectedData['controller'], $this->router->getController());
        $this->assertEquals($expectedData['action'], $this->router->getAction());
    }

    public function testTwrowingErrorWhenRequestIs404()
    {
        $this->expectException(FF\exceptions\UnavailableRequestException::class);
        $uri = 'job/unavailablerequest/';
        $this->router->parseUri($uri);
    }

}
