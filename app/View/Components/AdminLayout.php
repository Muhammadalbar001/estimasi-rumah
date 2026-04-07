<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AdminLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        // Mengarah ke file resources/views/layouts/admin.blade.php
        return view('layouts.admin'); 
    }
}