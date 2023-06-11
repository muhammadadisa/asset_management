<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Sdm;
use App\Models\Asset;
use App\Models\Komponen;
use App\Models\Log;
use App\Models\Software;
use App\Models\Transaksi_asset;
use App\Models\Transaksi_komponen;
use App\Models\Transaksi_software;
use Auth;
use DB;
use PDF;

class TransaksiController extends Controller
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
        $sdm= Sdm::all();;
        $asset= Asset::all();
        $komponen= Komponen::all();
        $software= Software::all();
        return view('transaksi.create ',compact('sdm','asset','komponen','software'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request->all());
         $trs = Transaksi::create([
                'sdm_id'=>$request->sdm_id,
                'tanggal_pinjam'=>$request->tanggal_pinjam,
                'tgl_pengembalian'=>$request->tgl_pengembalian,
            ]);
        $total=0;
        if(is_array($request->asset_id))
        {
            foreach($request->asset_id as $key => $item)
            {
                Transaksi_asset::create([
                    'asset_id'=>$item,
                    'transaksi_id'=>$trs->id,
                    'total'=>1,
                ]);
                $total++;
            }
        }
        
        if(is_array($request->komponen_id))
        {
            foreach($request->komponen_id as $key => $item)
            {
                Transaksi_komponen::create([
                    'komponen_id'=>$item,
                    'transaksi_id'=>$trs->id,
                    'total'=>1,
                ]);
                $total++;
            }
        }
        if(is_array($request->software_id))
        {
            foreach($request->software_id as $key => $item)
            {
                Transaksi_software::create([
                    'software_id'=>$item,
                    'transaksi_id'=>$trs->id,
                    'total'=>1,
                ]);
                $total++;
            }
        }
        

        Transaksi::where('id',$trs->id)->update([
            'total'=>$total
        ]);

         $tipe = 'create';
         $nama = Auth::user()->name;
         $ip = $_SERVER['REMOTE_ADDR'];
         $konten = $nama.' Transaksi '.$tipe.' dari '.$ip;
         Log::simpan($tipe,$nama,$konten,$ip);
         return redirect()->route('transaksi.index')->with('success','data baru ditambahkan');
    }
    public function getBarangPinjamanBelumKembali($sdm_id)
    {
        $pinjam_asset=DB::table('transaksi as trs')
                    ->join('transaksi_asset as tra','trs.id','=','tra.transaksi_id')
                    ->join('asset_hardware as ah','ah.id','=','tra.asset_id')
                    ->where('trs.tanggal_pengembalian','=',NULL)
                    ->select('tra.asset_id as id')
                    ->orderBy('trs.id','asc')
                    ->get(); 
        $pinjam_software=DB::table('transaksi as trs')
                    ->join('transaksi_software as tro','trs.id','=','tro.transaksi_id')
                    ->join('asset_software as ao', 'ao.id','=','tro.software_id')
                    ->where('trs.tanggal_pengembalian','=',NULL)
                    ->select('tro.software_id as id')
                    ->orderBy('trs.id','asc')->get();
        $pinjam_komponen=DB::table('transaksi as trs')
                    ->join('transaksi_komponen as trk','trs.id','=','trk.transaksi_id')
                    ->join('asset_komponen as ak', 'ak.id','=','trk.komponen_id')
                    ->where('trs.tanggal_pengembalian','=',NULL)
                    ->select('trk.komponen_id as id')
                    ->orderBy('trs.id','asc')->get();
        $asset = [];
        $komponen = [];
        $software = [];
        foreach ($pinjam_asset as $key => $value) {
            array_push($asset,$value->id);
        }
        foreach ($pinjam_software as $key => $value) {
            array_push($software,$value->id);
        }
        foreach ($pinjam_komponen as $key => $value) {
            array_push($komponen,$value->id);
        }

        return response()->json(['asset'=>$asset,'komponen'=>$komponen,'software'=>$software]);
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
        $sdm= Sdm::all();;
        $asset= Asset::all();
        $komponen= Komponen::all();
        $software= Software::all();
        $transaksi = DB::table('transaksi')->where('id',$id)->first();
        $transaksiAsset = DB::table('transaksi_asset as tra')
        ->join('asset_hardware as ah','ah.id','=','tra.asset_id')
        //->select('tra.asset_id')
        ->where('tra.transaksi_id',$id)
        ->get();
        // $arrasset=[];
        // foreach($transaksiAsset as $key=>$item){
        //     $arrasset[$key]=>$item->asset_id;
        // }
       // $transaksiAsset = Asset::whereNotIn('id',$arrasset)->get();


        $transaksiKomponen = DB::table('transaksi_komponen as trk')
        ->join('asset_komponen as ak','ak.id','=','trk.komponen_id')
        ->where('trk.transaksi_id',$id)
        ->get();
        $arrkomponen=[];
        $transaksiSoftware = DB::table('transaksi_software as tro')
        ->join('asset_software as ao','ao.id','=','tro.software_id')
        ->where('tro.transaksi_id',$id)
        ->get();
        $arrsoftware=[];
        return view('transaksi.edit',compact('sdm','asset','komponen','software','transaksiAsset','transaksiKomponen','transaksiSoftware','transaksi'));
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
        $data=Transaksi::find($id);
        $data->tanggal_pengembalian=$request->tgl_pengembalian;
        $data->update();
        return redirect('sdm')->with('success','data berhasil diupdate');
   }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function exportlaporanPDF($id)
    {$transaksi = DB::table('transaksi')->where('id',$id)->first();
        $transaksiAsset = DB::table('transaksi_asset as tra')
        ->join('asset_hardware as ah','ah.id','=','tra.asset_id')
        ->where('tra.transaksi_id',$id)
        ->get();
        $transaksiKomponen = DB::table('transaksi_komponen as trk')
        ->join('asset_komponen as ak','ak.id','=','trk.komponen_id')
        ->where('trk.transaksi_id',$id)
        ->get();
        $arrkomponen=[];
        $transaksiSoftware = DB::table('transaksi_software as tro')
        ->join('asset_software as ao','ao.id','=','tro.software_id')
        ->where('tro.transaksi_id',$id)
        ->get();
        $arrsoftware=[];
        $user=Sdm::find($transaksi->sdm_id);
        $pdf = PDF::loadview('transaksi.pdf',compact('user','transaksi','transaksiAsset','transaksiKomponen','transaksiSoftware'));
    	return $pdf->download('laporan_peminjaman_'.$user->nama.'.pdf');
    }
}
