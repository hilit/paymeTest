<?php

namespace App\Http\Controllers;
use App\Sale;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Symfony\Component\Console\Input\Input;

class SaleController extends Controller
{


   //public $sales=null;


    public function index()
    {
        $sales = Sale::orderBy('created_at', 'asc')->paginate(5);
       // dd($this->sales);
        return view('sales', compact('sales'));
    }



    public function store(Request $request)//,$description,$currency,$price
    {

      //  dd(Input::get('price'));
        //dd($request->price);
       $description = $request->description;
       $currency = $request->currency;
       $price = $request->price;
      // $responseFroPayMe = $this.insertSale($description,$currency,$price);
        $responseFroPayMe = self::insertSale($description,$currency,$price);
        $sale = new Sale;
        $sale->description = $description;
        $sale->currency=$responseFroPayMe->currency;
        $sale->price=$responseFroPayMe->price;
        $sale->sale_url=$responseFroPayMe->sale_url;
        $sale->status_code=$responseFroPayMe->status_code;
        $sale->payme_sale_code=$responseFroPayMe->payme_sale_code;
        $sale->payme_sale_id=$responseFroPayMe->payme_sale_id;
        $sale->price=$responseFroPayMe->price;
        $sale->transaction_id=$responseFroPayMe->transaction_id;
        $sale->status_code = $responseFroPayMe->status_code;

        $sale->save();
       return redirect('/sales');


    }


    public function insertSale($description,$currency,$price)
    {
        $client = new Client();
        $res =null;
       // $client = new Client(['verify' => '/my/path/to/mycertfile.pem']);
        try {
            $res = $client->request('POST', 'https://preprod.paymeservice.com/api/generate-sale', [
                'form_params' => [
                    'seller_payme_id' => 'MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N',
                    'sale_price' => $price,
                    'currency' => $currency,
                    'product_name' => $description,
                    'installments' => '1',
                    'language' => 'en'

                ]
            ]);
        } catch (GuzzleException $e) {
          dd($e);
        }
      //  dd($res);
        echo $res->getStatusCode();
        // 200
        echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        echo $res->getBody();
        // {"type":"User"...'
        return $res;
    }

}
