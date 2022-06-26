<?php
 
namespace App\Services\Midtrans;
use Midtrans\Transaction;
 
class TransactionService extends Midtrans
{
    protected $id;
 
    public function __construct($id)
    {
        parent::__construct();
 
        $this->id = $id;
    }
 
    public function getStatus(){
        return Transaction::status($this->id);
    }
}