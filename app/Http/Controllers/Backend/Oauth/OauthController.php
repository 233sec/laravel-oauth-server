<?php
namespace App\Http\Controllers\Backend\Oauth;

use DB;
use App\Http\Controllers\Controller;
use Datatables\X\DatatablesX;
use Tsssec\Editable\Editable;

class OauthController extends Controller{

    /**
     * Manage oauth-client(s)
     */
    public function client(){
        return view('backend.oauth.list_client');
    }

    public function clientSearch(){
        return DatatablesX::queryBuilder(
            DB::table('oauth_clients')
        )->make(true);
    }

    public function clientDetail($client_id){
        $Editable = new Editable();
        return $Editable->options([
            'columns_protected' => ['id', 'secret', 'created_at', 'updated_at'],
            'i18n' => [
                'lengend_1'     => '应用编辑',
                'name'          => '应用名称',
                'auto_submit'   => '自动提交',
                'group_id'      => '集团ID',
                'id'            => '应用ID',
                'secret'        => '私钥',
                'created_at'    => '创建时间',
                'updated_at'    => '修改时间',
            ]
        ])->queryBuilder(
            DB::table('oauth_clients')->where(['id' => $client_id])
        )->onsubmit(function($update){
            $update['updated_at'] = date('Y-m-d H:i:s');
            return $update;
        })->ready(function($Editable){
            return view('backend.oauth.detail_client', ['Editable' => $Editable]);
        });
    }

    public function clientCreate() {
        $Editable = new Editable();
        return $Editable->options([
            'columns_protected' => ['id', 'secret', 'created_at', 'updated_at'],
            'i18n' => [
                'lengend_1'     => '应用编辑',
                'name'          => '应用名称',
                'auto_submit'   => '自动提交',
                'group_id'      => '集团ID',
                'id'            => '应用ID',
                'secret'        => '私钥',
                'created_at'    => '创建时间',
                'updated_at'    => '修改时间',
            ]
        ])->insertTo(
            DB::table('oauth_clients')
        )->onsubmit(function($create){
            $create['id'] = str_random(16);
            $create['secret'] = str_random(32);
            $create['created_at'] = date('Y-m-d H:i:s');
            return $create;
        })->ready(function($Editable){
            return view('backend.oauth.detail_client', ['Editable' => $Editable]);
        });
    }

    public function clientEndpointSearch($client_id){
        return DatatablesX::queryBuilder(
            DB::table('oauth_client_endpoints')->where('client_id', $client_id)
        )->make(true);
    }

    public function clientEndpointCreate($client_id){
        $Editable = new Editable();
        return $Editable->options([
            'columns_protected' => ['id', 'secret', 'created_at', 'updated_at'],
            'i18n' => [
                'created_at'    => '创建时间',
                'updated_at'    => '修改时间',
            ]
        ])->insertTo(
            DB::table('oauth_client_endpoints')
        )->onsubmit(function($create) use($client_id){
            $create['client_id']  = $client_id;
            $create['created_at'] = date('Y-m-d H:i:s');
            return $create;
        })->ready(function($Editable){
            return view('backend.oauth.detail_client', ['Editable' => $Editable]);
        });

    }

    public function clientEndpointDetail($client_id, $endpoint_id){
        $Editable = new Editable();
        return $Editable->options([
            'columns_protected' => ['id', 'secret', 'created_at', 'updated_at'],
            'i18n' => [
                'created_at'    => '创建时间',
                'updated_at'    => '修改时间',
            ]
        ])->queryBuilder(
            DB::table('oauth_client_endpoints')->where(['client_id' => $client_id, 'id' => $endpoint_id])
        )->onsubmit(function($update){
            $update['updated_at'] = date('Y-m-d H:i:s');
            return $update;
        })->ready(function($Editable){
            return view('backend.oauth.detail_client', ['Editable' => $Editable]);
        });
    }

    /**
     * Manage the group of oauth-client(s)
     */
    public function group(){
        return view('backend.oauth.list_group');
    }
}
