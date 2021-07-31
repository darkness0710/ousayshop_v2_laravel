<?php

namespace App\Http\Controllers\Admin;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Models\ShopAccount;
use Carbon\Carbon;

class ShopAccountController extends \App\Http\Controllers\Controller
{
    protected $client;

    public function __construct()
    {
    }

    public function index()
    {
        $shopAccounts = ShopAccount::all();
        $type = $this->_getTypeConfig();
        $typeRegion = $this->_getTypeRegionConfig();
        return view('admin.shop_account.index', compact('shopAccounts', 'type', 'typeRegion'));
    }

    public function create()
    {
        $type = $this->_getTypeConfig();
        $typeRegion = $this->_getTypeRegionConfig();

        return view('admin.shop_account.create', compact('type', 'typeRegion'));
    }

    public function edit($id)
    {
        $type = $this->_getTypeConfig();
        $typeRegion = $this->_getTypeRegionConfig();
        $shop = ShopAccount::find($id);

        return view('admin.shop_account.edit', compact('shop', 'type', 'typeRegion'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'type' => 'required',
            'type_region' => 'required',
            'price' => 'required',
            'description' => 'required',
        ];

        $customMessages = [
            'name.required' => 'Tên loại tài khoản chưa được nhập!',
            'description.required' => 'Mô tả về tài khoản chưa được nhập!',
            'price.required' => 'Giá chưa được nhập!'
        ];

        $request->validate($rules, $customMessages);

        $params = $request->all();

        $params['is_show_sale_price'] = isset($params['is_show_sale_price']);
        $params['is_sell'] = isset($params['is_sell']);
        
        ShopAccount::create($params);
     
        return redirect()->route('admin.shops.index')
                        ->with('success', 'Tạo mới thành công tài khoản mới!');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'type' => 'required',
            'type_region' => 'required',
            'price' => 'required',
            'description' => 'required',
        ];

        $customMessages = [
            'name.required' => 'Tên loại tài khoản chưa được nhập!',
            'description.required' => 'Mô tả về tài khoản chưa được nhập!',
            'price.required' => 'Giá chưa được nhập!'
        ];

        $request->validate($rules, $customMessages);
        $params = $request->all();

        $params['is_show_sale_price'] = isset($params['is_show_sale_price']);
        $params['is_sell'] = isset($params['is_sell']);
        
        ShopAccount::find($id)->update($params);
     
        return redirect()->route('admin.shops.index')
            ->with('success', 'Cập nhật tài khoản thành công!');
    }

    public function destroy($id)
    {
        $shop = ShopAccount::find($id);
        $shop->delete();

        return redirect()->route('admin.shops.index')
            ->with('success', 'Xóa tài khoản thành công!');
    }

    protected function _getTypeConfig()
    {
        return [
            "0" => "Thiếu niên 3Q VNG",
            "1" => "Thiếu niên 3Q YOYO",
            "2" => "Thiếu niên 3Q 9G",
            "3" => "Tân OMG 3Q VNG",
            "4" => "Tân OMG 3Q China",
        ];
    }

    protected function _getTypeRegionConfig()
    {
        return [
            "0" => "Ngụy",
            "1" => "Ngô",
            "2" => "Thục",
            "3" => "Quần",
        ];
    }
}
