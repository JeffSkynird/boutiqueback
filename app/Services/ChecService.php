<?php
namespace App\Services;
class ChecService{
    private $publicKey="pk_38717aa0979e9d98d40c915927a99ecfa3a62eba0bf05";
    private $secretKey="sk_387173323740d627b286ab5242a4411624523346ae9a2";
    private $url="https://api.chec.io/v1/";
    function saveCategory($data){
        //SAVE CATEGORY
        $url=$this->url."categories";
        $data_string=json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-Public-Key: ".$this->publicKey;
        $headers[] = "X-Secret-Key: ".$this->secretKey;
        $headers[] = "X-Authorization: ".$this->secretKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $result=json_decode($result);
        return $result;

    }
    function editCategory($id,$data){
        //EDIT CATEGORY
        $url=$this->url."categories/".$id;
        $data_string=json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-Public-Key: ".$this->publicKey;
        $headers[] = "X-Secret-Key: ".$this->secretKey;
        $headers[] = "X-Authorization: ".$this->secretKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $result=json_decode($result);
        return $result;
    }
    function deleteCategory($id){
        //DELETE CATEGORY
        $url=$this->url."categories/".$id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-Public-Key: ".$this->publicKey;
        $headers[] = "X-Secret-Key: ".$this->secretKey;
        $headers[] = "X-Authorization: ".$this->secretKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $result=json_decode($result);
        return $result;
    }
    function saveDiscount($data){
        //SAVE DISCOUNT
        $url=$this->url."discounts";
        $data_string=json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-Public-Key: ".$this->publicKey;
        $headers[] = "X-Secret-Key: ".$this->secretKey;
        $headers[] = "X-Authorization: ".$this->secretKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $result=json_decode($result);
        return $result;
    }
    function editDiscount($id,$data){
        //EDIT DISCOUNT
        $url=$this->url."discounts/".$id;
        $data_string=json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-Public-Key: ".$this->publicKey;
        $headers[] = "X-Secret-Key: ".$this->secretKey;
        $headers[] = "X-Authorization: ".$this->secretKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $result=json_decode($result);
        return $result;
    }
    function deleteDiscount($id){
        //DELETE DISCOUNT
        $url=$this->url."discounts/".$id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-Public-Key: ".$this->publicKey;
        $headers[] = "X-Secret-Key: ".$this->secretKey;
        $headers[] = "X-Authorization: ".$this->secretKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $result=json_decode($result);
        return $result;
    }
    function saveAsset($data){
        //SAVE ASSET
        $url=$this->url."assets";
        $data_string=json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-Public-Key: ".$this->publicKey;
        $headers[] = "X-Secret-Key: ".$this->secretKey;
        $headers[] = "X-Authorization: ".$this->secretKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $result=json_decode($result);
        return $result;
    }
    function saveProduct($data){
        //SAVE PRODUCT
        $url=$this->url."products";
        $data_string=json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-Public-Key: ".$this->publicKey;
        $headers[] = "X-Secret-Key: ".$this->secretKey;
        $headers[] = "X-Authorization: ".$this->secretKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $result=json_decode($result);
        return $result;
    }
    function editProduct($id,$data){
        //EDIT PRODUCT
        $url=$this->url."products/".$id;
        $data_string=json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-Public-Key: ".$this->publicKey;
        $headers[] = "X-Secret-Key: ".$this->secretKey;
        $headers[] = "X-Authorization: ".$this->secretKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $result=json_decode($result);
        return $result;
    }
    function deleteProduct($id){
        //DELETE PRODUCT
        $url=$this->url."products/".$id;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "Content-Type: application/json";
        $headers[] = "X-Public-Key: ".$this->publicKey;
        $headers[] = "X-Secret-Key: ".$this->secretKey;
        $headers[] = "X-Authorization: ".$this->secretKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $result=json_decode($result);
        return $result;
    }
    function getOrders(){
        //GET ALL ORDERS
        $url=$this->url."orders";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "X-Public-Key: ".$this->publicKey;
        $headers[] = "X-Secret-Key: ".$this->secretKey;
        $headers[] = "X-Authorization: ".$this->secretKey;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        $result=json_decode($result);
        return $result;

    }
}