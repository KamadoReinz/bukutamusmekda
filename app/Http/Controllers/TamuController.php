<?php

namespace App\Http\Controllers;

use App\Models\TamuModel;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function list()
    {
        $data['getRecord'] = TamuModel::getRecord();
        $data['header_title'] = 'List Tamu';
        return view('admin.tamu.list', $data);
    }
}
