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
                $ijazah = Ijazah::where("nim","=",$detail_user[0]->nim)->get();
                $pending = Ijazah::where("nim","=",$detail_user[0]->nim)->WhereRaw("(status = 'approve by staff' or status = 'approve by dekan' or status = 'request ijazah')")->count();
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

    public function Store($nim){
        $ijazah = new Ijazah();

        $ijazah->nim = $nim;
        $ijazah->status = "request ijazah";

        $ijazah->save();

        return redirect()->back()->with('success', 'Data berhasil ditambah.');
    }

    public function Update(Request $request){
        $data = Ijazah::find($request->input('id'));

        $data->status = $request->input('submit_button');

        $data->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }
    
}
