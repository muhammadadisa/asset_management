<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sdm;
use App\Models\Log;
use DB;
use Auth;


class SdmController extends Controller
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
        $sdm= Sdm::all();
        $asset=  [];
        $software=[];
        $komponen=[];
        foreach($sdm as $key =>$item){
            $pinjam_asset=DB::table('transaksi as trs')->join('transaksi_asset as tra','trs.id','=','tra.transaksi_id')->join('asset_hardware as ah','ah.id','=','tra.asset_id')->where('trs.sdm_id',$item->id)->select('ah.nama as nama_asset','trs.tanggal_pinjam','trs.tanggal_pengembalian','trs.id')->orderBy('trs.id','asc')->get(); 
            $no_asset=0;
            foreach($pinjam_asset as $data_assset){
                $asset[$item->id][$no_asset]['id'] = $data_assset->id;
                $asset[$item->id][$no_asset]['html'] = '<p>ID Pinjaman : <b>'.$data_assset->id.'</b><br>Nama asset : <b>'.$data_assset->nama_asset.'</b> <br>tanggal pinjam : <b>'.$data_assset->tanggal_pinjam.'</b> <br>tanggal pengembalian : <b>'.$data_assset->tanggal_pengembalian.'</b></p>';
                $no_asset++; 
            }
            $pinjam_software=DB::table('transaksi as trs')->join('transaksi_software as tro','trs.id','=','tro.transaksi_id')->join('asset_software as ao', 'ao.id','=','tro.software_id')->where('trs.sdm_id',$item->id)->select('ao.nama as nama_software','trs.tanggal_pinjam','trs.tanggal_pengembalian','trs.id')->orderBy('trs.id','asc')->get();
            $no_software=0;
            foreach($pinjam_software as $data_software){
                $software[$item->id][$no_software]['id'] = $data_software->id;
                $software[$item->id][$no_software]['html'] = '<p>ID Pinjaman : <b>'.$data_software->id.'</b><br>Nama software : <b>'.$data_software->nama_software.'</b> <br>tanggal pinjam : <b>'.$data_software->tanggal_pinjam.'</b> <br>tanggal pengembalian : <b>'.$data_software->tanggal_pengembalian.'</b></p>';
                $no_software++; 
            }
            $pinjam_komponen=DB::table('transaksi as trs')->join('transaksi_komponen as trk','trs.id','=','trk.transaksi_id')->join('asset_komponen as ak', 'ak.id','=','trk.komponen_id')->where('trs.sdm_id',$item->id)->select('ak.nama as nama_komponen','trs.tanggal_pinjam','trs.tanggal_pengembalian','trs.id')->orderBy('trs.id','asc')->get();
            $no_komponen=0;
            foreach($pinjam_komponen as $data_komponen){
                $komponen[$item->id][$no_komponen]['id'] = $data_komponen->id;
                $komponen[$item->id][$no_komponen]['html'] = '<p> ID Pinjaman : <b>'.$data_komponen->id.'</b><br>Nama komponen : <b>'.$data_komponen->nama_komponen.'</b> <br>tanggal pinjam : <b>'.$data_komponen->tanggal_pinjam.'</b> <br>tanggal pengembalian : <b>'.$data_komponen->tanggal_pengembalian.'</b></p>';
                $no_komponen++; 
            }
        }
        //return $software[2];
        return view('sdm.index',compact('sdm','asset','software','komponen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sdm.create');
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

         Sdm::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
            'seksi' => $request->seksi,
            'bidang' => $request->bidang,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'pangkat' => $request->pangkat,
            'foto' => $file_foto,
            
         ]);
         $tipe = 'create';
         $nama = Auth::user()->name;
         $ip = $_SERVER['REMOTE_ADDR'];
         $konten = $nama.' User '.$tipe.' dari '.$ip;
         Log::simpan($tipe,$nama,$konten,$ip);
         return redirect()->route('sdm.index')->with('success','data baru ditambahkan');
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
        $data=Sdm::find($id);
        return view('sdm.edit',compact('data','id'));
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
       

        Sdm::where('id',$id)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
            'seksi' => $request->seksi,
            'bidang' => $request->bidang,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'pangkat' => $request->pangkat,
            'foto' => $file_foto,
        ]);
        $tipe = 'update';
         $nama = Auth::user()->name;
         $ip = $_SERVER['REMOTE_ADDR'];
         $konten = $nama.' User '.$tipe.' dari '.$ip;
         Log::simpan($tipe,$nama,$konten,$ip);
        return redirect()->route('sdm.index')->with('success','data baru ditambahkan');
   }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Sdm::find($id)->delete();
        $tipe = 'delete';
         $nama = Auth::user()->name;
         $ip = $_SERVER['REMOTE_ADDR'];
         $konten = $nama.' User '.$tipe.' dari '.$ip;
         Log::simpan($tipe,$nama,$konten,$ip);
        return redirect()->route('sdm.index')->with('success','data baru ditambahkan');
    
    }
}
