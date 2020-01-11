<?php

class Cart extends Controller
{


    protected $products =  [];
    protected $cart = [];

    protected $total = 0;

    protected $totalItems = 0;

    public function __construct()
    {
        $this->cart = State::get();
        $this->products = State::getProducts();
        $this->totalItems = $this->getTotalItems();
        $this->total = $this->getTotal();

    }

    public function index()
    {
        $data = [
            'products' => $this->products,
            'cart' => $this->cart,
            'total' => $this->total,
            'totalItems' => $this->totalItems
        ];

        $this->view('index', $data);
    }

    public function add($product)
    {
        if (!empty($product)) {
            $data = array_filter($this->products, function ($item) use ($product) {
                return $item['name'] == $product;
            });
            sort($data);
            State::add($data[0]);
        }
        Redirect('/');
    }

    public function remove($product)
    {
        if (!empty($product)) {
            $data = array_filter($this->cart, function ($item) use ($product) {
                if ($item['name'] != $product) return $item;
            });
            State::updateState($data);
        }
        Redirect('/');
    }


    public function removeQuantity($product)
    {
        if (!empty($product)) {
            $data = array_map(function ($item) use ($product) {
                if ($item['name'] == $product) {
                    $item['quantity'] -= 1;
                }
                return $item;
            }, $this->cart);
            State::updateState($data);
        }
        Redirect('/');
    }

    public function addQuantity($product)
    {
        if (!empty($product)) {
            $data = array_map(function ($item) use ($product) {
                if ($item['name'] == $product) {
                    $item['quantity'] += 1;
                }
                return $item;
            }, $this->cart);
            State::updateState($data);
        }
        Redirect('/');
    }

    private function getTotal() {
        $total = 0;
        foreach ($this->cart as $item) {

            $total += $item['quantity'] * $item['price'];
        }
        return $total;
    }

    private function getTotalItems()
    {
        $totalItems = 0;
        foreach ($this->cart as $item) {

            $totalItems += $item['quantity'];
        }
        return $totalItems;
    }

    public function clearState()
    {
        session_destroy();
        Redirect('/');
    }
}
