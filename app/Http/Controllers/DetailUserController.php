<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailUser;
use App\Models\Ijazah;
use Carbon\Carbon;

class DetailUserController extends Controller
{
    public function Index($id){
        $detail_user = DetailUser::where("user_id","=",$id)->get();
        if (count($detail_user) > 0) {
            $date = $detail_user[0]->tgl_lahir;
            $formattedDate = Carbon::parse($date)->format('j F Y');
        }else{
            $detail_user = null;
            $formattedDate = "";
        }

        return view('data_user', compact('detail_user','formattedDate'));
    }

    public function Action(Request $request){
        $val = $request->input('button');
        if ($val == "tambah") {
            $detail_user = new DetailUser();
        }else{
            $detail_user = DetailUser::find($request->input('id'));
            $ijazah = Ijazah::where("nim","=",$detail_user->nim)->first();
            if ($ijazah) {
                $ijazah->nim = $request->input('nim');
    
                $ijazah->save();
            }
        }

        $detail_user->user_id = $request->input('user_id');
        $detail_user->nim = $request->input('nim');
        $detail_user->tgl_lahir = $request->input('tgl_lahir');
        $detail_user->tempat_lahir = $request->input('tempat_lahir');
        $detail_user->program_studi = $request->input('program_studi');
        $detail_user->fakultas = $request->input('fakultas');

        $detail_user->save();
        
        return redirect()->back();
    }
}
