<?php

namespace Modules\HRMS\app\View\Components\Atoms;

use Illuminate\View\Component;
use Illuminate\View\View;

class FlashMessage extends Component
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
        return view('hrms::components.atoms/flashmessage');
    }
}
