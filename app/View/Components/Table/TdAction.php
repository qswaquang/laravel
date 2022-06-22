<?php

namespace App\View\Components\Table;

use Illuminate\View\Component;

class TdAction extends Component
{
    public array $actions;

    public function __construct(array $actions)
    {
        $this->actions = $actions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.td-action');
    }
}
