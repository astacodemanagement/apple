<?php

namespace App\Http\Controllers;

use App\Models\LogHistori;
use Illuminate\Support\Facades\Hash;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Halaman Footer";
        $subtitle = "Menu Footer";
        $footer = Footer::all();
        // $footer = Cache::remember('footer', 60, function () {
        //     return Footer::all();
        // });

        return view('back.footer.index', compact('title', 'subtitle', 'footer'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_footer' => 'required|unique:footer,nama_footer', // Nama kategori berita harus unik
            'urutan' => 'integer', // Validasi angka
        ], [
            'nama_footer.required' => 'Nama Footer Wajib diisi',
            'nama_footer.unique' => 'Nama Footer sudah terdaftar',
            'urutan.integer' => 'Urutan harus berupa angka',
        ]);



        $input = $request->all();


        // Membuat user baru dan mendapatkan data pengguna yang baru dibuat
        $user = Footer::create($input);

        // Mendapatkan ID pengguna yang sedang login
        $loggedInFooterId = Auth::id();

        // Simpan log histori untuk operasi Create dengan user_id yang sedang login
        $this->simpanLogHistori('Create', 'Footer', $user->id, $loggedInFooterId, null, json_encode($user));

        return redirect('/footer')->with('message', 'Data berhasil ditambahkan');
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $footer = Footer::findOrFail($id);

        return response()->json($footer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_footer' => 'required', // Nama kategori berita harus unik
            'urutan' => 'integer', // Validasi angka
        ], [
            'nama_footer.required' => 'Nama Footer Wajib diisi',
            'urutan.integer' => 'Urutan harus berupa angka',
        ]);
        // Ambil data user yang akan diupdate
        $footer = Footer::findOrFail($id);

        $input = $request->all();

        // Mendapatkan ID pengguna yang sedang login
        $loggedInUserId = Auth::id();

        // Simpan log histori untuk operasi Update dengan user_id yang sedang login
        $this->simpanLogHistori('Update', 'Footer', $footer->id, $loggedInUserId, json_encode($footer), json_encode($input));

        $footer->update($input);
        return response()->json(['message' => 'Data berhasil diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer = Footer::find($id);

        if (!$footer) {
            return response()->json(['message' => 'Data footer not found'], 404);
        }

        $oldpictureFileName = $footer->file; // Nama file saja
        $oldfilePath = public_path('upload/user/' . $oldpictureFileName);

        if ($oldpictureFileName && file_exists($oldfilePath)) {
            unlink($oldfilePath);
        }

        $footer->delete();
        $loggedInFooterId = Auth::id();

        // Simpan log histori untuk operasi Delete dengan user_id yang sedang login dan informasi data yang dihapus
        $this->simpanLogHistori('Delete', 'Footer', $id, $loggedInFooterId, json_encode($footer), null);

        return response()->json(['message' => 'Data Berhasil Dihapus']);
    }

    // Fungsi untuk menyimpan log histori
    private function simpanLogHistori($aksi, $tabelAsal, $idEntitas, $pengguna, $dataLama, $dataBaru)
    {
        $log = new LogHistori();
        $log->tabel_asal = $tabelAsal;
        $log->id_entitas = $idEntitas;
        $log->aksi = $aksi;
        $log->waktu = now(); // Menggunakan waktu saat ini
        $log->pengguna = $pengguna;
        $log->data_lama = $dataLama;
        $log->data_baru = $dataBaru;
        $log->save();
    }
}
