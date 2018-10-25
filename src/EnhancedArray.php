<?php

namespace EnhancedArray;


class EnhancedArray
{
    private $values = [];

    public function __construct(...$params)
    {
        foreach( $params as $param ) {
            $this->values[] = $param;
        }
    }


    public function get( $index )
    {
        return $this->values[$index] ?? null;
    }


    public function getValues()
    {
        return $this->values;
    }


    public function addValue( $value )
    {
        $this->values[] = $value;

        return $this;
    }


    public function addIndexedValue( $index, $value )
    {
        $this->values[$index] = $value;

        return $this;
    }


    public function addValues( ...$params )
    {
        foreach( $params as $param ) {
            $this->values[] = $param;
        }


        return $this;
    }


    public function addArrayValues( array $params )
    {
        foreach( $params as $param ) {
            $this->addValue( $param );
        }

        return $this;
    }


    public function remove( $value )
    {
        if ( ! in_array( $value, $this->values ) ) {
            throw new \Exception("The array doesn't contain the value {$value}");
        }

        unset( $this->values[ array_search($value, $this->values) ] );

        return $this;
    }


    public function merge( EnhancedArray $enhancedArray )
    {
        foreach( $enhancedArray->getValues() as $value ) {
            $this->addValue( $value );
        }

        return $this;
    }
}
