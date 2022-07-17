<?php

namespace App\View\Components\form;

use Illuminate\View\Component;

class FormSimple extends Component
{
    public array $inputs;

    public function __construct(array $inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.form-simple');
    }
}
