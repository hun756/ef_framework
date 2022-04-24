<?php

class Welcome extends Controller {
    public function __construct() {
    }

    // check data
    public function index() {
        $this->view('pages/index', ['title' => 'Welcome']);
    }

    public function about() {
        $this->view('pages/about');
    }
}