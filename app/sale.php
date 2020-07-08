<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    protected $table = 'sales';
    public $description;
    public $price;
    public $currency;
    public $sale_url;
    public $status_code;
    public $payme_sale_code;
    public $payme_sale_id;
    public $transaction_id;



    protected $fillable = [
        'description',
        'currency',
        'price',

    ];


//$table->foreignId('seller_payme_id');




    public function user()
    {
        return $this->belongsTo(User::class);
    }


}




