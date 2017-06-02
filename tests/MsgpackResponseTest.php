<?php

use Symfony\Component\HttpFoundation\Response;
use LGC\Msgpack\MsgpackResponse;
use Illuminate\Support\Collection;

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
        $response = $this->response->setData([
            'a' => 'ha'
        ]);

        $this->assertNotEquals($response->getContent(), $origin);

        $collection = new Collection(['hello' => 'world']);
        $response = $this->response->setData([
            'collection' => $collection
        ]);

        $this->assertNotEquals($response->getContent(), $origin);
        $this->assertEquals($response->getData(), [
            'collection' => $collection->toArray()
        ]);
    }

    /**
     * Test getData.
     * 
     * @return void
     */
    public function testGetData()
    {
        $response = $this->response->getData();

        $this->assertEquals([
            'hello' => 'lumtify'
        ], $response);
    }
}
