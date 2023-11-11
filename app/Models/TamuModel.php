<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class TamuModel extends Model
{
    use HasFactory;

    protected $table = 'tamu';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = self::select('tamu.*')
                        ->where('is_delete', '=', 0);
                        if (!empty(Request::get('date')))
                        {
                            $return = $return->whereDate('created_at', '=', Request::get('date'));
                        }

        $return = $return->orderBy('id', 'desc')
                        ->paginate(15);

        return $return;
    }
}
