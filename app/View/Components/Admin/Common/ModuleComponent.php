<?php

namespace App\View\Components\Admin\Common;

use App\Models\Module;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModuleComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $modules = Module::all();
        return view('components.admin.common.module-component',compact('modules'));
    }
}