<?php

class EnhancedArray
{
    private $values = [];

    public function __construct(...$params)
    {
        foreach( $params as $param ) {
            $this->values[] = $param;
        }
    }
}
