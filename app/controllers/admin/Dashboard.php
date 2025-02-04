<?php
class Dashboard extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->createModel("ProductModel");
    }
    public function index()
    {
        $data['data']['products'] = $this->model->readProducts();
        $this->render("layouts/admin", $data);
    }
}