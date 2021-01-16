<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;
use App\Models\Wisata;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinasi = Wisata::simplePaginate(5);
        return view('admin.destinasi', ['destinasi' => $destinasi]);
    }

    public function beranda()
    {
        $carousel = DB::table('wisata')->select('foto')->latest()->limit(10)->get();
        return view('admin.index', ['carousel' => $carousel]);
    }

    public function galery()
    {
        $galery = DB::table('wisata')->select('wisata', 'foto')->latest()->simplePaginate(10);
        // dd($galery);
        return view('admin.galery', ['galery' => $galery]);
    }
    public function tentang()
    {
        $tentang = [
            'foto' => 'https://cdn.idntimes.com/content-images/post/20181122/suoh-afandiarif-e2b3e6e0398d368feeadd6a48831615b.jpg',
            'descripsi' => 'Lampung merupakan salah satu Provinsi yang ada di Indonesia yang memiliki banyak potensi sumber daya alam. Sumber daya alam tersebut banyak yang dikelola menjadi destinasi wisata yang akan menarik minat wisatawan sehingga banyak orang yang akan berkunjung ke sana.
            Banyak potensi wisata yang ada di Lampung seperti wisata alam, sejarah, budaya, edukasi, religi, dan masih banyak lagi. Setiap destinasi wisata yang dihadirkan di Lampung memiliki rasa yang berbeda-beda tergantung dengan destinasi wisata tersebut.
            Jika ingin berkunjung ke Lampung untuk berlibur, Anda tidak perlu khawatir akan keindahan destinasi wisatanya. Karena semua tempat wisata yang ada di Lampung sangat menarik untuk dikunjungi. Jadi, Anda hanya perlu mempersiapkan diri untuk menikmati keseruan liburan di Lampung nantinya. Maka dari itu, Anda perlu mengetahui beberapa Tempat Wisata di Lampung. Hal ini agar mempermudah untuk menemukan destinasi tersebut saat akan dicari.'
        ];
        return view('admin.tentang', ['tentang' => $tentang]);
    }
    public function kontak()
    {
        $saran = Saran::all();
        $kontak = [
            'admin1' => '+6289578990898',
            'admin2' => '+6289278905467'
        ];
        return view('admin.kontak', ['kontak' => $kontak, 'saran' => $saran]);
    }

    public function saran(Request $request){
        Saran::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'kritik' => $request->input('kritik'),
            'saran' => $request->input('saran'),
        ]);

        Session::flash('success', 'Saran berhasil ditambah');
        return redirect()->route('AdminKontak');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('foto');
        $filename = time() . "_" . $image->getClientOriginalName();
        $address = 'image_upload';
        $image->move($address, $filename);

        $item = [
            'wisata' => $request->input('destinasi'),
            'descripsi' => $request->input('descripsi'),
            'foto' => $filename,
            'alamat' => $request->input('alamat'),
        ];

        // dd($item);

        Wisata::create($item);

        Session::flash('success', 'Wisata berhasil ditambah');
        return redirect()->route('destinasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destinasi = Wisata::findOrFail($id);
        // dd($destinasi);
        return view('admin.detail_wisata', ['destinasi' => $destinasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Wisata::findOrFail($id);
        return $data;
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
        $data = Wisata::findOrFail($id);

        $filename = $data->foto;
        if ($request->hasFile('foto')) {
            $image_path = public_path() . '/image_upload/' . $filename;
            if (file_exists($image_path))
                File::delete($image_path);
            $image = $request->file('foto');
            $filename = time() . "_" . $image->getClientOriginalName();
            $address = 'image_upload';
            $image->move($address, $filename);
        }

        $data->wisata = $request->destinasi;
        $data->foto = $filename;
        $data->descripsi = $request->descripsi;
        $data->alamat = $request->alamat;

        // dd($data);
        $data->update();

        Session::flash('success', 'Wisata berhasil diubah');
        return redirect()->route('destinasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Wisata::findOrFail($id);
        $filename = $data->foto;
        $image_path = public_path() . '/image_upload/' . $filename;
        if (file_exists($image_path))
            File::delete($image_path);
        $data->delete();

        Session::flash('success', 'Wisata berhasil dihapus');
        return redirect()->route('destinasi.index');
    }
}
