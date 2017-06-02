<?php

namespace LGC\MsgPack;

use MessagePack\TypeTransformer\TypeTransformer;
use Illuminate\Contracts\Support\Arrayable;

class ArrayableTransformer implements TypeTransformer
{
    /**
     * Id.
     * 
     * @var int
     */
    protected $id;
    
    /**
     * Constructor.
     * 
     * @param int $id 
     * @return void
     */
    public function __construct($id=0)
    {
        $this->id = $id;
    }

    /**
     * Get id.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Supports
     *
     * @param mixed $value
     * @return bool
     */
    public function supports($value)
    {
        return $value instanceof Arrayable;
    }

    /**
     * Transform.
     *
     * @param mixed $value
     * @return mixed
     */
    public function transform($value)
    {
        return $value->toArray();
    }

    /**
     * Reverse transform.
     *
     * @param string $data
     * @return mixed
     */
    public function reverseTransform($data)
    {
        return $data;
    }
}