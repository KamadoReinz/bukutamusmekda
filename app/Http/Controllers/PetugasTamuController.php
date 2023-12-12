<?php

namespace App\Http\Controllers;

use App\Models\TamuModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PetugasTamuController extends Controller
{
    public function list()
    {
        $data['getRecord'] = TamuModel::getRecord();
        $data['header_title'] = 'List Tamu';
        return view('petugas.tamu.list', $data);
    }

    public function insert(Request $request)
    {
        Carbon::setLocale('id_ID');
        Carbon::setToStringFormat('d F Y H:i:s');

        $tanggal = Carbon::now()->setTimezone('Asia/Jakarta');
        
        $save = new TamuModel;
        $save->nama = $request->nama;
        $save->alamat = $request->alamat;
        $save->tujuan = $request->tujuan;
        $save['created_at'] = $tanggal;
        $save->save();

        return redirect('petugas/tamu/list')->with('success', 'Tamu Berhasil Ditambahkan');
    }

    public function update($id, Request $request)
    {
        Carbon::setLocale('id_ID');
        Carbon::setToStringFormat('d F Y H:i:s');

        $tanggal = Carbon::now()->setTimezone('Asia/Jakarta');

        $save = TamuModel::getSingle($id);
        $save->nama = $request->nama;
        $save->alamat = $request->alamat;
        $save->tujuan = $request->tujuan;
        $save['created_at'] = $tanggal;
        $save->save();

        return redirect('petugas/tamu/list')->with('success', 'Tamu Berhasil Diperbarui');
    }

    public function delete($id)
    {
        $save = TamuModel::getSingle($id);
        $save->delete();

        return redirect('petugas/tamu/list')->with('success', 'Tamu Berhasil Dihapus');
    }

}
