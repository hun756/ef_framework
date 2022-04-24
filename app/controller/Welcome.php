<?php

class Welcome extends Controller {
    public function __construct() {
    }

    // check data
    public function index() {
        $data = [
            'title' => 'welcome',
        ];
        $this->view('pages/index', $data);
    }

    public function about() {
        $this->view('pages/about');
    }
}