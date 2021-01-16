<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use App\Models\wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $carousel = DB::table('wisata')->select('foto')->latest()->limit(10)->get();
        return view('user.index', ['carousel' => $carousel]);
    }

    public function destinasi()
    {
        $destinasi = wisata::simplePaginate(5);
        return view('user.destinasi', ['destinasi' => $destinasi]);
    }
    public function galery()
    {
        $galery = DB::table('wisata')->select('wisata', 'foto')->latest()->simplePaginate(10);
        return view('user.galery', ['galery' => $galery]);
    }
    public function tentang()
    {
        $tentang = [
            'foto' => 'https://cdn.idntimes.com/content-images/post/20181122/suoh-afandiarif-e2b3e6e0398d368feeadd6a48831615b.jpg',
            'descripsi' => 'Lampung merupakan salah satu Provinsi yang ada di Indonesia yang memiliki banyak potensi sumber daya alam. Sumber daya alam tersebut banyak yang dikelola menjadi destinasi wisata yang akan menarik minat wisatawan sehingga banyak orang yang akan berkunjung ke sana.
            Banyak potensi wisata yang ada di Lampung seperti wisata alam, sejarah, budaya, edukasi, religi, dan masih banyak lagi. Setiap destinasi wisata yang dihadirkan di Lampung memiliki rasa yang berbeda-beda tergantung dengan destinasi wisata tersebut.
            Jika ingin berkunjung ke Lampung untuk berlibur, Anda tidak perlu khawatir akan keindahan destinasi wisatanya. Karena semua tempat wisata yang ada di Lampung sangat menarik untuk dikunjungi. Jadi, Anda hanya perlu mempersiapkan diri untuk menikmati keseruan liburan di Lampung nantinya. Maka dari itu, Anda perlu mengetahui beberapa Tempat Wisata di Lampung. Hal ini agar mempermudah untuk menemukan destinasi tersebut saat akan dicari.'
        ];
        return view('user.tentang', ['tentang' => $tentang]);
    }
    public function kontak()
    {
        $saran = Saran::all();
        $kontak = [
            'admin1' => '+6289578990898',
            'admin2' => '+6289278905467'
        ];
        return view('user.kontak', ['kontak' => $kontak, 'saran' => $saran]);
    }

    public function saran(Request $request)
    {
        Saran::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'kritik' => $request->input('kritik'),
            'saran' => $request->input('saran'),
        ]);

        Session::flash('success', 'Saran berhasil ditambah');
        return redirect()->route('UserKontak');
    }

    public function show($id)
    {
        $destinasi = Wisata::findOrFail($id);
        // dd($destinasi);
        return view('user.detail_wisata', ['destinasi' => $destinasi]);
    }
}
