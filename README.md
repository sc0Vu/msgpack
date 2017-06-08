# msgpack

[![Build Status](https://travis-ci.org/sc0Vu/msgpack.svg?branch=master)](https://travis-ci.org/sc0Vu/msgpack)
[![codecov](https://codecov.io/gh/sc0Vu/msgpack/branch/master/graph/badge.svg)](https://codecov.io/gh/sc0Vu/msgpack)
[![Dependency Status](https://www.versioneye.com/user/projects/59298ac60546cb00422b3b66/badge.svg?style=flat-square)](https://www.versioneye.com/user/projects/59298ac60546cb00422b3b66)
[![License](https://poser.pugx.org/guancheng/msgpack/license)](https://packagist.org/packages/guancheng/msgpack)

The lumen api response wrapper for rybakit/msgpack.

# Install

    composer require guancheng/msgpack

or

    clone / download this repo

# Usage

### Response
    
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

If you want to return Arrayable object, just do it!
    
    use Illuminate\Support\Collection;
    use Illuminate\Routing\Controller;
    use LGC\Msgpack\MsgpackResponse;

    class TestController extends Controller
	{
	    public function test()
	    {
	        return new MsgpackResponse([
	            'success' => true,
	            'data' => new Collection([
	            	'hello' => 'lumtify'
	            ])
	        ]);
	    }
	}

> When use arrayable types you have to notice: due to we don't remember pack data type, so the getData() always return array

### Test

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

# Roadmap
    
> Make other laravel data type transformer.

# Licence

MIT


## Support on Beerpay
Hey dude! Help me out for a couple of :beers:!

[![Beerpay](https://beerpay.io/sc0Vu/msgpack/badge.svg?style=beer-square)](https://beerpay.io/sc0Vu/msgpack)  [![Beerpay](https://beerpay.io/sc0Vu/msgpack/make-wish.svg?style=flat-square)](https://beerpay.io/sc0Vu/msgpack?focus=wish)