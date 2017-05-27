# msgpack

The lumen api response wrapper for rybakit/msgpack.

# Install

    composer require

or

    clone / download this repo

# Usage

Response
    
    use Illuminate\Routing\Controller;
    use LGC\Msgpack\MsgpackResponse;

    class TestController extends Controller
	{
	    public function test()
	    {
	        return new MsgpackResponse([
	            'success' => true
	        ]);
	    }
	}

Test

	use LGC\Msgpack\MsgpackConcern;

	class TestApiTest extends PHPUnit_Framework_TestCase
	{
	    use MsgpackConcern;

	    public function testShouldSeeMsgpack()
	    {
	    	$this->shouldSeeMsgpack();
	    }
	}

# Development
    
    clone the repo

    composer install

# Licence

MIT
