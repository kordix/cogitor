<?php namespace App\Traits;

class ExampleCode
{
    public static function printThis()
    {
        echo "Trait executed";
        dd('fdsafdas');
    }

    public function anotherMethod()
    {
        echo "Trait – anotherMethod() executed";
    }
}
