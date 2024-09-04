<?php

namespace App\Http\Controllers;

use App\Models\Alasan;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\KategoriBerita;
use App\Models\KategoriProduk;


use App\Models\Produk;
use App\Models\Visitor;
use App\Models\Slider;
use App\Models\Testimoni;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent; // Pustaka untuk mengurai user-



class HomeController extends Controller
{
    public function index()
    {
        $title = "Halaman Utama";
        $subtitle = "Menu Utama";
        $agent = new Agent(); // Buat instance untuk mengurai user-agent

        // Simpan visitor
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $visit_time = date('Y-m-d H:i:s');
        $session_id = session_id(); // Ambil ID sesi
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        // Ambil informasi tentang perangkat dan OS
        $device = $agent->device(); // Nama perangkat (misalnya, iPhone, Android)
        $platform = $agent->platform(); // Nama OS (misalnya, Windows, iOS)
        $browser = $agent->browser(); // Nama browser (misalnya, Chrome, Safari)

        Visitor::create([
            'ip_address' => $ip_address,
            'visit_time' => $visit_time,
            'session_id' => $session_id,
            'user_agent' => $user_agent,
            'device' => $device,
            'platform' => $platform,
            'browser' => $browser,
        ]);

        // Gunakan eager loading untuk produk dan produk_diskon
        $produk = Produk::with(['kategoriProduk'])
            ->where('status', 'Aktif')
            ->where(function ($query) {
                $query->where('status_diskon', 'Non Aktif')
                    ->orWhereNull('status_diskon');
            })
            ->orderBy('urutan')
            ->take(12)
            ->get();

        $produk_diskon = Produk::with(['kategoriProduk'])
            ->where('status_diskon', 'Aktif')
            ->orderBy('urutan')
            ->take(6)
            ->get();

        $galeri = Galeri::all();
        $alasan = Alasan::all();
        $testimoni = Testimoni::all();
        $slider = Slider::all();
        $kategori_produk = KategoriProduk::all();

        return view('front.home', compact('slider', 'galeri','title', 'subtitle', 'kategori_produk', 'produk', 'alasan', 'testimoni', 'produk_diskon'));
    }


    public function produk_sale(Request $request)
    {
        $title = "Halaman Produk";
        $subtitle = "Menu Produk";
        $kategori_produk = KategoriProduk::orderBy('urutan', 'asc')->get();

        $query = Produk::with('kategoriProduk')
            ->where('produk.status', 'Aktif');

        if ($request->has('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($query) use ($keyword) {
                $query->where('produk.nama_produk', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('produk.deskripsi', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('kategoriProduk', function ($query) use ($keyword) {
                        $query->where('nama_kategori_produk', 'LIKE', '%' . $keyword . '%');
                    });
            });
        }

        if ($request->has('kategori_id')) {
            $kategoriId = $request->kategori_id;
            $query->where('produk.kategori_produk_id', $kategoriId);
        }

        if ($request->has('sortSelect')) {
            $sortSelect = $request->sortSelect;

            switch ($sortSelect) {
                case 'termurah':
                    $query->orderByRaw('CAST(produk.harga_jual AS UNSIGNED) ASC');
                    break;
                case 'termahal':
                    $query->orderByRaw('CAST(produk.harga_jual AS UNSIGNED) DESC');
                    break;
                case 'terlaris':
                    break;
                default:
                    break;
            }
        }

        // Proses pengacakan produk
        if ($request->has('random')) {
            $produk = $query->inRandomOrder()->paginate(10);
        } else {
            // Lakukan paginasi dengan 10 item per halaman
            $produk = $query->paginate(12);
        }

        return view('front.produk', compact('title', 'subtitle', 'kategori_produk', 'produk'));
    }

    public function produk_sale_detail($slug)
    {
        $title = "Halaman Produk Detail";
        $subtitle = "Menu Produk Detail";
        $produk = Produk::where('slug', $slug)->firstOrFail();
        // Mengambil kategori produk terkait
        $kategori_produk_terkait = $produk->kategoriProduk;

        return view('front.produk_detail', compact('produk', 'kategori_produk_terkait', 'title', 'subtitle'));
    }

    public function location() {

            return view('front.location');
    }
    public function service() {

            return view('front.service');
    }
    public function feature() {

            return view('front.feature');
    }
    public function promo() {

            return view('front.promo');
    }
    public function blog() {
        $title = "Halaman Berita";
        $subtitle = "Menu Berita";
        $berita = Berita::orderBy('urutan', 'asc')->paginate(10); // Batasi jumlah berita per halaman
        $kategoriBerita = KategoriBerita::all();

        return view('front.blog.index', compact('title', 'subtitle', 'berita', 'kategoriBerita'));
    }


    public function blog_detail($slug) {
        $title = "Halaman Berita Detail";
        $subtitle = "Menu Berita Detail";
        $berita = Berita::where('slug', $slug)->firstOrFail();
        $kategoriBerita = KategoriBerita::all(); // Ambil semua kategori berita
        return view('front.blog.detail', compact('berita', 'title', 'subtitle','kategoriBerita'));
    }


}
