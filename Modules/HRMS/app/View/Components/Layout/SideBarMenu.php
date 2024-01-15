<?php

namespace Modules\HRMS\app\View\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class SideBarMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('hrms::components.layout/sidebarmenu');
    }
}
