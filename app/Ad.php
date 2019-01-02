<?php

namespace Monboncoin;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    public function user()
    {
        return $this->belongsTo('Monboncoin\User');
    }
}
