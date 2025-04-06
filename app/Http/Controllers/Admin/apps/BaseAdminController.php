<?php

namespace App\Http\Controllers\Admin\Apps;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class BaseAdminController extends Controller
{
    protected $prefix;

    public function __construct()
    {
        $this->prefix = $this->getPrefix();
        view()->share('prefix', $this->prefix);
    }

    private function getPrefix()
    {
        $guards = ['superadmin', 'sale', 'marketing'];
    
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $guard; // Return the authenticated guard as the prefix
            }
        }
    
        return 'admin'; // Fallback if no guard is detected
    }
    
}
