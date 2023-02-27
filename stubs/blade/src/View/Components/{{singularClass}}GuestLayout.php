<?php

namespace App\Modules\{{pluralClass}}\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class {{singularClass}}GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('{{singularSlug}}.layouts.guest');
    }
}
