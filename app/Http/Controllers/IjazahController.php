<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ijazah;
use App\Models\DetailUser;
use Carbon\Carbon;

class IjazahController extends Controller
{
    public function Index($id, $level){
        if ($level == "mhs") {
            $detail_user = DetailUser::where("user_id", "=", $id)->get();
            if (count($detail_user) > 0) {
                $date = $detail_user[0]->tgl_lahir;
                $formattedDate = Carbon::parse($date)->format('j F Y');
                $ijazah = Ijazah::join('detail_user', 'ijazah.nim', '=', 'detail_user.nim')->join('users', 'detail_user.user_id', '=', 'users.id')->select('ijazah.*', 'detail_user.user_id')->where("ijazah.nim","=",$detail_user[0]->nim)->get(); 
                $pending = Ijazah::where("nim","=",$detail_user[0]->nim)->WhereRaw("(status = 'approve by staff' or status = 'approve by dekan' or status = 'request ijazah')")->count();
                // dd($ijazah);
            }else{
                $pending = 0;
                $ijazah = null;
                $detail_user = null;
                $formattedDate = "";
            }
            
            return view('ijazah', compact('ijazah', 'detail_user', 'pending', 'formattedDate'));
        }else if ($level == "staff") {
            $ijazah = Ijazah::WhereRaw("status = 'approve by staff' or status = 'request ijazah'")->get();

            return view('ijazah', compact('ijazah'));
        }else if ($level == "dekan") {
            $ijazah = Ijazah::WhereRaw("status = 'approve by dekan' or status = 'approve by staff'")->get();

            return view('ijazah', compact('ijazah'));
        } else {
            $ijazah = Ijazah::all();

            return view('ijazah', compact('ijazah'));
        }
    }

    public function IjazahAdmin(Request $request){
        $status = $request->input('status');
        if ($status != "") {
            $ijazah = Ijazah::WhereRaw("status = '$status'")->get();
        }else{
            $ijazah = Ijazah::all();
        }

        return view('ijazah_admin', compact('ijazah'));
    }

    public function Store(Request $request){
        $ijazah = new Ijazah();

        if ($request->input('nim_perwakilan') != "") {
            $nimm = $request->input('nim');
            $count_ijazah = DetailUser::where("nim","=",$nimm)->count();
            if ($count_ijazah == 0) {
                return redirect()->back()->with('failed', 'NIM Yang Diwakilkan Tidak Ada.');
            }
        }
// dd($request);
        $ijazah->nim = $request->input('nim');
        $ijazah->nim_perwakilan = $request->input('nim_perwakilan');
        $ijazah->upload_skl = $request->input('upload_skl');
        $ijazah->upload_pembayaran = $request->input('upload_pembayaran');
        $ijazah->upload_surat_kuasa = $request->input('upload_surat_kuasa');
        $ijazah->upload_ktp = $request->input('upload_ktp');
        $ijazah->status = "request ijazah";

        $ijazah->save();

        return redirect()->back()->with('success', 'Data berhasil ditambah.');
    }

    public function Update(Request $request){
        $data = Ijazah::find($request->input('id'));

        $data->status = $request->input('status');
        $data->alasan = $request->input('alasan');
        $data->name_approve = $request->input('name_approve');

        $data->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function AmbilIjazah(Request $request){
        $data = Ijazah::find($request->input('id'));

        $data->alasan = $request->input('alasan');
        $data->nama_pengambil = $request->input('nama_pengambil');
        $data->upload_foto_pengambilan = $request->input('upload_foto_pengambilan');
        $data->surat_kuasa_pengambilan = $request->input('surat_kuasa_pengambilan');

        $data->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }
    
}
