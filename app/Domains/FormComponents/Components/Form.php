<?php

namespace App\Domains\FormComponents\Components;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;

class Form extends Component
{

    /**
     * Request method.
     */
    public string $method;
    public string $FormMethod;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $method = 'POST')
    {
        $this->FormMethod = in_array(strtoupper($method), ['DELETE', 'PUT', 'PATCH']) ? 'POST' : strtoupper($method);
        $this->method = strtoupper($method);
    }


    /**
     * Returns a boolean wether the error bag is not empty.
     *
     * @param string $bag
     * @return boolean
     */
    public function hasError($bag = 'default'): bool
    {
        $errors = View::shared('errors', fn() => request()->session()->get('errors', new ViewErrorBag));

        return $errors->getBag($bag)->isNotEmpty();
    }
}
