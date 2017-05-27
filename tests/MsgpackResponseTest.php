<?php

use Symfony\Component\HttpFoundation\Response;
use LGC\Msgpack\MsgpackResponse;

class MsgpackResponseTest extends PHPUnit_Framework_TestCase
{
    /**
     * Message pack response
     * 
     * @var \LGC\Msgpack\MsgpackResponse
     */
    protected $response;

    /**
     * setUp
     *
     * @return void
     */
    public function setUp()
    {
        $this->response = new MsgpackResponse([
            'hello' => 'lumtify'
        ]);
    }
    
    /**
     * Test Extends Response
     * 
     * @return void
     */
    public function testExtendsResponse()
    {
        $this->assertTrue($this->response instanceof Response);
    }

    /**
     * Test setData.
     *
     * @return void
     */
    public function testSetData()
    {
        $origin = $this->response->getContent();
        $data = $this->response->setData([
            'a' => 'ha'
        ]);

        $this->assertNotEquals($data->getContent(), $origin);
    }

    /**
     * Test getData.
     * 
     * @return void
     */
    public function testGetData()
    {
        $data = $this->response->getData();

        $this->assertEquals([
            'hello' => 'lumtify'
        ], $data);
    }
}
