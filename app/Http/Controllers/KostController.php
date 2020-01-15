<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kost;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class KostController extends Controller
{
    public function index(request $data){
        $itemId = isset($data['itemId']) ? $data['itemId'] : 0;
        $search = isset($data['search']) ? $data['search'] : "";
        $province = isset($data['province']) ? $data['province'] : "";
        $city = isset($data['city']) ? $data['city'] : "";
        $priceOrder = isset($data['priceOrder']) ? $data['priceOrder'] : 0;
        $order = '>';
        if ($itemId>0) {
            $order = '<';
        }
        $order1 = 'id';
        $order2 = 'desc';
        if ($priceOrder != 0 ) {
            $order1 = 'price_month';
            if ($priceOrder == 1) {
                $order2 = 'asc';
            }else{
                $order2 = 'desc';
            }
        }

        $kosts = Kost::where('id',$order,$itemId)
                        ->where('caption','like', "%$search%")
                         ->where('province','like', "%$province%")
                         ->where('city','like', "%$city%")
                         ->where_not_null('remove_at')
                        ->orderBy($order1,$order2)
                        ->limit(10)
                        ->get();

        foreach($kosts as $kost){
            $kost['amenities'] = explode(",",$kost['amenities']);
            $kost['imgUrl'] = explode(",",$kost['imgUrl']);
            unset($kost['available_room_count']);
            $itemId = $kost['id'];
         }

         $response = array('error'=>false,
                            'error_code'=>0,
                            'itemId'=>$itemId,
                            'kosts'=> $kosts);

        return response($response,200);
       
    }

    public function create(Request $request){
        $userId = $request['id'];
        $api_token = $request['api_token'];
        $check = User::where(['id'=>$userId, 'api_token'=>$api_token])->first();

        if (count($check)>0) {
           $kost = Kost::create([
                'caption' => $request['caption']
            ]);
            Kost::where('id', $kost['id'])
            ->update(['kost' => $request['kost'],
                    'available_room_count' => $request['available_room_count'],
                    'amenities' => $request['amenities'],
                    'imgUrl' => $request['imgUrl'],
                    'large' => $request['large'],
                    'description' => $request['description'],
                    'owner_id' => $request['id'],
                    'price_day' => $request['price_day'],
                    'price_week' => $request['price_week'],
                    'price_month' => $request['price_month'],
                    'price_year' => $request['price_year'],
                    'province' => $request['province'],
                    'city' => $request['city'],
                    'distric' => $request['distric'],
                    'location' => $request['location']]);
            $kost = Kost::where('id', $kost['id'])->first();
            $kost['amenities'] = explode(',',$kost['amenities']);
            $kost['imgUrl'] = explode(',',$kost['imgUrl']);
            $response = array('error'=>false,
                                'error_code'=>0,
                                'messages'=>'Success Add Kost',
                                'kost'=> $kost);
            $status = 200;
        }else{
            $response = array('error'=>true,
                                'error_code'=>400,
                                'messages'=>'Wrong Authentication');
            $status = 400;
        }

        return response($response,$status);
    }

    public function update(request $request){
        $userId = $request['id_user'];
        $api_token = $request['api_token'];
        $check = User::where(['id'=>$userId, 'api_token'=>$api_token])->first();

        $checkKostAuth = Kost::where(['id'=>$request['id_kost'], 'owner_id'=>$$userId])->first();

        if (count($check)>0 && count($checkKostAuth) > 0) {
            Kost::where(['id'=> $request['id'], 'remove_at'=>null])
                ->update(['kost' => $request['kost'],
                    'available_room_count' => $request['available_room_count'],
                    'amenities' => $request['amenities'],
                    'imgUrl' => $request['imgUrl'],
                    'large' => $request['large'],
                    'description' => $request['description'],
                    'owner_id' => $request['id'],
                    'price_day' => $request['price_day'],
                    'price_week' => $request['price_week'],
                    'price_month' => $request['price_month'],
                    'price_year' => $request['price_year'],
                    'province' => $request['province'],
                    'city' => $request['city'],
                    'distric' => $request['distric'],
                    'location' => $request['location']]);
            $kost = Kost::where('id', $kost['id'])->first();
            $kost['amenities'] = explode(',',$kost['amenities']);
            $kost['imgUrl'] = explode(',',$kost['imgUrl']);
            $response = array('error'=>false,
                                'error_code'=>0,
                                'messages'=>'Success Add Kost',
                                'kost'=> $kost);
            $status = 200;
        }else{
            $response = array('error'=>true,
                                'error_code'=>400,
                                'messages'=>'You are not allowed to edit data');
            $status = 400;
        }
        return response($response,$status);
    }

    public function delete($id){
        $userId = $request['id_user'];
        $api_token = $request['api_token'];
        $check = User::where(['id'=>$userId, 'api_token'=>$api_token])->first();

        $checkKostAuth = Kost::where(['id'=>$request['id_kost'], 'owner_id'=>$$userId])->first();

        if (count($check)>0 && count($checkKostAuth) > 0) {
            Kost::where('id', $request['id'])
            ->update('remove_at',date("Y-m-d H:i:s"));
            $response = array('error'=>false,
                                'error_code'=>0,
                                'messages'=>'Success Delete Kost');
            $status = 200;
        }else{
            $response = array('error'=>true,
                                'error_code'=>400,
                                'messages'=>'You are not allowed to delete data');
            $status = 400;
        }
        return response($response,$status);
    }

    public function detileKost(request $data){
        // $userId = $data['id'];
        // $api_token = $data['api_token'];
        // $check = User::where(['id'=>$userId, 'api_token'=>$api_token])->first();
        $kost = Kost::where('id', $data['id_kost'])->first();
        if (count($kost)>0) {
            //$kost = Kost::where('id', $data['id_kost'])->first();
            $kost['amenities'] = explode(',',$kost['amenities']);
            $kost['imgUrl'] = explode(',',$kost['imgUrl']);
            unset($kost['available_room_count']);
            $response = array('error'=>false,
                                'error_code'=>0,
                                'kost'=> $kost);
            $status = 200;
        }else{
            $response = array('error'=>true,
                                'error_code'=>404,
                                'messages'=>'Not Found');
            $status = 404;
        }

        return response($response,$status);
    }

    public function checkAvailableKost(request $data){
        $userId = $data['id'];
        $api_token = $data['api_token'];
        $check = User::where(['id'=>$userId, 'api_token'=>$api_token])->first();
        
        if (count($check)>0 && $check['balances'] > 5) {
            $kost = Kost::where('id', $data['id_kost'])->first();
            $kost['amenities'] = explode(',',$kost['amenities']);
            $kost['imgUrl'] = explode(',',$kost['imgUrl']);
            $messages = "Room is Full";
            if ($kost['available_room_count']>0) {
                $messages = "Still Available for ".$kost['available_room_count']." rooms";
            }
            $balances = $check['balances'] - 5;
            User::where(['id'=>$userId, 'api_token'=>$api_token])
                ->update(['balances'=>$balances]);
            $response = array('error'=>false,
                                'error_code'=>0,
                                'messages' => $messages,
                                'kost'=> $kost);
            $status = 200;
        }else{
            $response = array('error'=>true,
                                'error_code'=>404,
                                'messages'=>'Your Balances is not enough');
            $status = 404;
        }

        return response($response,$status);
    }

    public function register(Request $data){
        $check = User::where('email',$data['email'])->first();
        if(!$check){ 
            $hash = Str::random(32);
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            User::where('email', $data['email'])
            ->update(['api_token' => $hash, 'remember_token'=> $hash, 'balances'=>50]);
            $users = User::where('email',$data['email'])->first();
            $response = array('error'=>false,
                                'error_code'=>0,
                                'user'=>$users);
            $status = 200;
        }
        else{
            $response = array('error'=>true,
                                'error_code'=>400,
                                'messages'=>'email already taken');

            $status = 400;
        }
        return response($response,$status);
        
    }

    public function showUser(Request $data){
        $hash = Str::random(32);
        User::where('id', $data['id'])
        ->update(['api_token' => $hash, 'remember_token'=> $hash]);
        $users = User::where('id',$data['id'])->first();

        $response = array('error' => true,
                           'error_code'=> 100,
                          'messages'=>'User not found');
        $status = 400;
        if (count($users)>0) {
            $response = array('error' => false,
                            'error_code'=> 0,
                            'user'=>$users);
            $status = 200;
        }
        
        return response($response,$status);
    }

    public function loginApi(Request $request){

        $email = $request->email;
        $password = $request->password;
        
        $response = array('error'=>true,
                            'error_code'=>100,
                            );
        $status = 502;                            

        $data = User::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                
                $hash = Str::random(32);
                User::where('id', $data['id'])
                ->update(['api_token' => $hash, 'remember_token'=> $hash]);
                $users = User::where('id',$data['id'])->first();

                $response = array('error' => false,
                                    'error_code'=> 0,
                                    'user'=>$users);
                $status = 200;
            }
            else{
                $messages = "Wrong email or password";
                $status = 400;
                $response = array('error'=>true,
                                'error_code'=>100,
                                'messages'=>$messages);
            }
        }
        else{
            $messages = "Wrong email or password";
            $status = 400;
            $response = array('error'=>true,
                                'error_code'=>100,
                                'messages'=>$messages);
        }
        return response($response,$status);
    }

}
