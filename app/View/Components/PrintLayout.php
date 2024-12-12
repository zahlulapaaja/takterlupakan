<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrintLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        app(config('settings.KT_THEME_BOOTSTRAP.print'))->init();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view(config('settings.KT_THEME_LAYOUT_DIR') . '._print');
        // return view('components.print-layout');
    }
}
