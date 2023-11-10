<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return TamuModel::select('tamu.*')
                    ->where('tamu.is_delete', '=', 0)
                    ->orderBy('tamu.id', 'desc')
                    ->paginate(15);
    }
}
