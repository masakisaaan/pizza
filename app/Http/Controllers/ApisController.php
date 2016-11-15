<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Service\CartService;

class ApisController extends Controller {

    public function countCartContents() {
        return CartService::countCartContents();
    }
}
