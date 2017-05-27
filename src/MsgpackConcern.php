<?php

namespace LGC\Msgpack;

use Illuminate\Support\Str;
use MessagePack\Packer;
use MessagePack\BufferUnpacker;
use PHPUnit\Framework\Assert as PHPUnit;

trait MsgpackConcern
{
    /**
     * Assert that the response contains messagepack.
     *
     * @return $this
     */
    protected function shouldReturnMsgpack()
    {
        return $this->seeMsgpack();
    }

    /**
     * Assert that the response contains an exact messagepack array.
     *
     * @param  array  $data
     * @return $this
     */
    public function seeMsgpackEquals(array $data)
    {
        $packer = new Packer();

        try {
            $packed = $packer->pack($data);
            $hex = implode("", unpack("H*", $packed));

            if ((mb_strlen($hex) % 2) === 0) {
                $str = implode(" ", str_split($hex, 2));
            }

            PHPUnit::assertEquals($str, $this->response->getContent());

        } catch (\MessagePack\Exception\PackingFailedException $e) {

            PHPUnit::fail('Messagepack is not equal.');
        }

        return $this;
    }

    /**
     * Assert that the response contains messagepack.
     *
     * @param  array|null  $data
     * @return $this
     */
    public function seeMsgpack(array $data = null)
    {
        if (is_null($data)) {
            $data = $this->response->getData();

            PHPUnit::assertNotNull($data);
            
            return $this;
        }

        return $this->seeMsgpackContains($data);
    }

    /**
     * Assert that the response contains the given messagepack array.
     *
     * @param  array  $data
     * @return $this
     */
    protected function seeMsgpackContains(array $data)
    {
        $actual = $this->response->getData();

        if (is_null($actual)) {
            return PHPUnit::fail('Invalid messagepack data was returned from the route.');
        }

        $actual = json_encode(array_sort_recursive(
            (array) $actual
        ));

        foreach (array_sort_recursive($data) as $key => $value) {
            $expected = json_encode([$key => $value]);
            $expected = substr($expected, 1, strlen($expected) -2);

            $this->assertTrue(Str::contains($actual, $expected), "Unable to find Messagepack fragment {$expected}.");
        }

        return $this;
    }
}
