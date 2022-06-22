<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{

    public function __construct()
    {

    }

    

    public function render()
    {
        return view('components.form.input');
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return "shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" + $this->class;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
}
