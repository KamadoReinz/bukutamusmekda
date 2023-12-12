<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class TamuModel extends Model
{
    use HasFactory;

    protected $table = 'tamu';

    protected $guarded=[
        'id'
    ];

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        $return = self::select('tamu.*');
                        if (!empty(Request::get('date')))
                        {
                            $return = $return->whereDate('created_at', '=', Request::get('date'));
                        }

        $return = $return->orderBy('id', 'desc')
                        ->paginate(15);

        return $return;

    }
}
