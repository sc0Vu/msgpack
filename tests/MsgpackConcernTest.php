<?php

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use LGC\Msgpack\MsgpackConcern;
use LGC\Msgpack\MsgpackResponse;

class TestController extends Controller
{
    public function test()
    {
        return new MsgpackResponse([
            'hello' => 'world',
            'success' => true
        ]);
    }
}

class MsgpackConcernTest extends PHPUnit_Framework_TestCase
{
    use MsgpackConcern;

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
        $request = Request::create('/');
        $controller = new TestController;
        $this->response = $controller->test($request);
    }

    /**
     * Test shouldReturnMsgpack.
     *
     * @return void
     */
    public function testShouldReturnMsgpack()
    {
        $this->shouldReturnMsgpack();
    }

    /**
     * Test seeMsgpackEquals.
     * 
     * @return void
     */
    public function testSeeMsgpackEquals()
    {
        $this->seeMsgpackEquals([
            'hello' => 'world',
            'success' => true
        ]);
    }

    /**
     * Test seeMsgpack.
     * 
     * @return void
     */
    public function testSeeMsgpack()
    {
        $this->seeMsgpack([
            'success' => true
        ]);
    }
}
