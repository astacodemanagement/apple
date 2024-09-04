<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class SubmenuController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Menu';
        $subtitle = "Halaman Menu";
        $menu = Menu::all();
        $submenu = SubMenu::all();
        return view('back.submenu.index', compact('title', 'menu','subtitle','submenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:menus',
            'menu_id' => 'required|exists:menus,id',

        ],[
            'name.required' => 'Nama menu harus diisi',
            'slug.required' => 'Slug harus diisi',
            'slug.unique' => 'Slug sudah ada',
            'menu_id.required' => 'Menu harus diisi',
            'menu_id.exists' => 'Menu tidak ditemukan',

        ]);

        SubMenu::create($request->all());
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
        $id = Auth::id();

        $this->simpanLogHistori("Menambahkan menu", "Menambahkan menu", $id);


       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $submenu = Submenu::find($id);
        return response()->json($submenu);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:menus',
            'menu_id' => 'required|exists:menus,id',

        ],[
            'name.required' => 'Nama menu harus diisi',
            'slug.required' => 'Slug harus diisi',
            'slug.unique' => 'Slug sudah ada',
            'menu_id.required' => 'Menu harus diisi',
            'menu_id.exists' => 'Menu tidak ditemukan',

        ]);
        $menu = SubMenu::find($id);
        $menu->update($request->all());
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diubah');
        $id = Auth::id();

        $this->simpanLogHistori("Mengubah menu", "Mengubah menu", $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = SubMenu::find($id);
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
        $id = Auth::id();

        $this->simpanLogHistori("Menghapus menu", "Menghapus menu", $id);
    }
}
