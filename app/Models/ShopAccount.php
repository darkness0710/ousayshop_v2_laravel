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
    // is_sell
    // type_region // 0: nguy 1: ngo 2: thuc 3: quan

    // "0" => "Thiếu niên 3Q VNG",
    // "1" => "Thiếu niên 3Q YOYO",
    // "2" => "Thiếu niên 3Q 9G",
    // "3" => "Tân OMG 3Q VNG",
    // "4" => "Tân OMG 3Q China",

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
        'is_sell',
        'type',
        'type_region',
    ];

    public function getDefaulThumbnailUrl()
    {
        if ($this->type == '0') {
            return asset('images/client_game_tn3q_vng.jpg');
        }
        if ($this->type == '1' || $this->type == '2') {
            return asset('images/client_game_tn3q_china.jpg');
        }
        if ($this->type == '3') {
            return asset('images/client_game_tan_omg_3q_vng.webp');
        }
        if ($this->type == '4') { 
            return asset('images/client_game_tan_omg_3q_china.jpg');
        }
    }

    public function getIsShowSaleMessage()
    {
        return $this->is_show_sale_price == true ? '(Đang sử dụng)' : '(Không sử dụng)';
    }

    public function getIsSaleMessage()
    {
        return $this->is_sell == true ? '(Đã bán)' : '(Còn hàng)';
    }

    public function getPriceAndSaleMessage()
    {
        return number_format($this->price) . " VNĐ " . $this->getIsSaleMessage();
    }

    public function getObjectImages()
    {
        if (blank($this->images)) {
            return [];
        }
        return json_decode($this->images);
    }
}
