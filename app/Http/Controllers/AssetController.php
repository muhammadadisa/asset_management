<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Log;
use Auth;
use DB;
class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asset= Asset::all();
        $pinjam=[];
        foreach ($asset as $key => $value) {
            $pinjam[$value->id]="";
            $item=DB::table('transaksi as trs')
            ->join('transaksi_asset as tra','trs.id','=','tra.transaksi_id')
            ->join('sdm as s','s.id','=','trs.sdm_id')
            ->where('tra.asset_id',$value->id)
            ->select('s.nama as nama_sdm','trs.tanggal_pinjam','trs.tanggal_pengembalian','trs.id')
            ->orderBy('trs.id','asc')
            ->first();
            if($item){
                $pinjam[$value->id]=$item->nama_sdm;
            }
        }
       
        return view('asset.index',compact('asset','pinjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asset.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //     'kode'=>'required',
        //     'nama'=>'required',
        //     'kondisi'=>'required',
        //     'harga'=>'required',
        //     'tgl_input'=>'required',
        //     'foto'=>'required',
        //     'lokasi'=>'required',
        //     ]
        //  );
        $file_foto = $this->uploadFile($request, 'foto');

         Asset::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kondisi' => $request->kondisi,
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'tgl_input' => $request->tgl_input,
            'foto' => $file_foto,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'vendor' => $request->vendor,
            'warna' => $request->warna,
            'noseri' => $request->noseri,
            
         ]);
         $tipe = 'create';
         $nama = Auth::user()->name;
         $ip = $_SERVER['REMOTE_ADDR'];
         $konten = $nama.' Asset '.$tipe.' dari '.$ip;
         Log::simpan($tipe,$nama,$konten,$ip);
         return redirect()->route('asset.index')->with('success','data baru ditambahkan');
    }
    public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            $extension = explode('.',$name);
            $extension = strtolower(end($extension));
            $key = rand().'-'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "admin/".$oke."/";
            $file->move($tmp_file_path,$tmp_file_name);
            $result = url('/').'/'.'admin/'.$oke.''.'/'.$tmp_file_name;
        return $result;
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
        $data=Asset::find($id);
        return view('asset.edit',compact('data','id'));
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
        //dd($request->all());
        if($request->file('foto')==null){

            $file_foto = $request->old_foto;
        }
        else{
            $file_foto = $this->uploadFile($request, 'foto');
        }
       

        Asset::where('id',$id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kondisi' => $request->kondisi,
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'tgl_input' => $request->tgl_input,
            'foto' => $file_foto,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'vendor' => $request->vendor,
            'warna' => $request->warna,
            'noseri' => $request->noseri,
           
        ]);
        $tipe = 'update';
        $nama = Auth::user()->name;
        $ip = $_SERVER['REMOTE_ADDR'];
        $konten = $nama.' Asset '.$tipe.' dari '.$ip;
        Log::simpan($tipe,$nama,$konten,$ip);
        return redirect()->route('asset.index')->with('success','data baru ditambahkan');
        return redirect()->route('asset.index')->with('success','data baru ditambahkan');
   }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Asset::find($id)->delete();
        $tipe = 'delete';
        $nama = Auth::user()->name;
        $ip = $_SERVER['REMOTE_ADDR'];
        $konten = $nama.' Asset '.$tipe.' dari '.$ip;
        Log::simpan($tipe,$nama,$konten,$ip);
        return redirect()->route('asset.index')->with('success','data baru ditambahkan');
        return redirect()->route('asset.index')->with('success','data baru ditambahkan');
    
    }
}
