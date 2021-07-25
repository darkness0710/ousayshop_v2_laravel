<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopAccount extends Model
{
    // structure [shops]
    // id
    // name
    // description // long_text
    // private_note // long_text
    // price // float
    // sale_price // float
    // images // json
    // created_at
    // updated_at
    // deleted_at
    // is_show_sale_price
    // type // 0: TN3Q
    // type_region // 0: nguy 1: ngo 2: thuc 3: quan

    protected $guarded = [];

    protected $table = 'shop_accounts';

    protected $fillable = [
        'name',
        'description',
        'private_note',
        'price',
        'sale_price',
        'images',
        'is_show_sale_price',
        'type',
        'type_region',
    ];
}
