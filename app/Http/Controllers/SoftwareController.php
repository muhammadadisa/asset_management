<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Software;
use App\Models\Log;
use Auth;
use DB;

class SoftwareController extends Controller
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
        $software= Software::all();
        $pinjam=[];
        foreach ($software as $key => $value) {
            $pinjam[$value->id]="";
            $item=DB::table('transaksi as trs')
            ->join('transaksi_software as tro','trs.id','=','tro.transaksi_id')
            ->join('sdm as s','s.id','=','trs.sdm_id')
            ->where('tro.software_id',$value->id)
            ->select('s.nama as nama_sdm','trs.tanggal_pinjam','trs.tanggal_pengembalian','trs.id')
            ->orderBy('trs.id','asc')
            ->first();
            if($item){
                $pinjam[$value->id]=$item->nama_sdm;
            }
           // dd($pinjam);
        
    }
    return view('software.index',compact('software','pinjam'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('software.create');
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

         Software::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kondisi' => $request->kondisi,
            'harga' => $request->harga,
            'tgl_input' => $request->tgl_input,
            'tgl_ex' => $request->tgl_ex,
            'link' => $request->link,
            
         ]);
         $tipe = 'create';
         $nama = Auth::user()->name;
         $ip = $_SERVER['REMOTE_ADDR'];
         $konten = $nama.' Software '.$tipe.' dari '.$ip;
         Log::simpan($tipe,$nama,$konten,$ip);
         return redirect()->route('software.index')->with('success','data baru ditambahkan');
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
        $data=Software::find($id);
        return view('software.edit',compact('data','id'));
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
       

        Software::where('id',$id)->update([
           'kode' => $request->kode,
           'nama' => $request->nama,
           'kondisi' => $request->kondisi,
           'harga' => $request->harga,
           'tgl_input' => $request->tgl_input,
           'tgl_ex' => $request->tgl_ex,
           'link' => $request->link,
           
        ]);
        $tipe = 'update';
         $nama = Auth::user()->name;
         $ip = $_SERVER['REMOTE_ADDR'];
         $konten = $nama.' Software '.$tipe.' dari '.$ip;
         Log::simpan($tipe,$nama,$konten,$ip);
        return redirect()->route('software.index')->with('success','data baru ditambahkan');
   }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Software::find($id)->delete();
        $tipe = 'delete';
         $nama = Auth::user()->name;
         $ip = $_SERVER['REMOTE_ADDR'];
         $konten = $nama.' Software '.$tipe.' dari '.$ip;
         Log::simpan($tipe,$nama,$konten,$ip);
        return redirect()->route('software.index')->with('success','data baru ditambahkan');
    
    }
}
