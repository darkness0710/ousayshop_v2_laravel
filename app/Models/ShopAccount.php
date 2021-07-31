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
        return 'https://ousayshop.github.io/img/tn3q_product.551f5acb.png';
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
