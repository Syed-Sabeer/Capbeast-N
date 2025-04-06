<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderStatus extends Component
{
    /**
     * The order status.
     *
     * @var int
     */
    public $status;

    /**
     * Create a new component instance.
     *
     * @param int $status
     * @return void
     */
    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render(): View
    {
        return view('components.order-status');
    }
}
