<?php

namespace App\Domains\FormComponents\Components;

class FormErrors extends Component
{
    public string $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $name)
    {
        $this->name = str_replace(['[', ']'], ['.', ''], $name);
    }
}
