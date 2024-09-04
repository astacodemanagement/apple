<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Menu';
        $subtitle = "Halaman Menu";
        $menu = Menu::all();
        return view('back.menu.index', compact('title', 'menu','subtitle'));
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
        // Validasi input
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:menus',
            'header' => 'nullable',
            'desc' => 'nullable',
            'title_card_one' => 'nullable',
            'title_card_two' => 'nullable',
            'image_card_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'image_card_two' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'desc_card_one' => 'nullable',
            'desc_card_two' => 'nullable',
        ],[
            'name.required' => 'Nama menu harus diisi',
            'slug.required' => 'Slug harus diisi',
            'slug.unique' => 'Slug sudah ada',
            'image_card_one.image' => 'File harus berupa gambar',
            'image_card_one.mimes' => 'File harus berupa gambar',
            'image_card_one.max' => 'Ukuran gambar maksimal 5MB',
            'image_card_two.image' => 'File harus berupa gambar',
            'image_card_two.mimes' => 'File harus berupa gambar',
            'image_card_two.max' => 'Ukuran gambar maksimal 5MB',
        ]);
    
        $data = $request->all();
    
        if($request->hasFile('image_card_one')){
            $image_card_one = $request->file('image_card_one');
            $image_card_one_name = time().'_'.$image_card_one->getClientOriginalName();
            $image_card_one->move(public_path('upload/menu/cardone'), $image_card_one_name);
            $data['image_card_one'] = $image_card_one_name;
        }
    
        if($request->hasFile('image_card_two')){
            $image_card_two = $request->file('image_card_two');
            $image_card_two_name = time().'_'.$image_card_two->getClientOriginalName();
            $image_card_two->move(public_path('upload/menu/cardtwo'), $image_card_two_name);
            $data['image_card_two'] = $image_card_two_name;
        }
    
        Menu::create($data);    
        $id = Auth::id();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
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
        $menu = Menu::find($id);
        return response()->json($menu);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $menu = Menu::find($id);
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:menus,slug,'.$menu->id,
            'header' => 'nullable',
            'desc' => 'nullable',
            'title_card_one' => 'nullable',
            'title_card_two' => 'nullable',
            'image_card_one' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'image_card_two' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'desc_card_one' => 'nullable',
            'desc_card_two' => 'nullable',
        ],[
            'name.required' => 'Nama menu harus diisi',
            'slug.required' => 'Slug harus diisi',
            'slug.unique' => 'Slug sudah ada',
            'image_card_one.image' => 'File harus berupa gambar',
            'image_card_one.mimes' => 'File harus berupa gambar',
            'image_card_one.max' => 'Ukuran gambar maksimal 5MB',
            'image_card_two.image' => 'File harus berupa gambar',
            'image_card_two.mimes' => 'File harus berupa gambar',
            'image_card_two.max' => 'Ukuran gambar maksimal 5MB',
        ]);
    
        $data = $request->all();
    
        if($request->hasFile('image_card_one')){
            $image_card_one = $request->file('image_card_one');
            $image_card_one_name = time().'_'.$image_card_one->getClientOriginalName();
            $image_card_one->move(public_path('upload/menu/cardone'), $image_card_one_name);
            $data['image_card_one'] = $image_card_one_name;
        }
    
        if($request->hasFile('image_card_two')){
            $image_card_two = $request->file('image_card_two');
            $image_card_two_name = time().'_'.$image_card_two->getClientOriginalName();
            $image_card_two->move(public_path('upload/menu/cardtwo'), $image_card_two_name);
            $data['image_card_two'] = $image_card_two_name;
        }
    
        $menu->update($data);
        $id = Auth::id();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
        $id = Auth::id();

        $this->simpanLogHistori("Menghapus menu", "Menghapus menu", $id);
    }
}
