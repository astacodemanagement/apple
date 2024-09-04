<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class HomeMenuController extends Controller
{
    public function menu($slug){
        $menu = Menu::where('slug', $slug)->first();
        // dd($menu);  
        return view('front.menu.index', compact('menu'));
    }
    public function submenu($slug){
        $submenu = SubMenu::where('slug', $slug)->first();
        // dd($submenu);  
        return view('front.submenu.index', compact('submenu'));
    }
}
