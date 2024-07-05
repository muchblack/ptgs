<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class FrontController extends Controller
{

    public function index(): \Inertia\Response
    {
        return Inertia::render('TGSIndex', []);
    }

    public function newsList(): \Inertia\Response
    {
        return Inertia::render('NewsList', []);
    }

    public function newsDetail($id)
    {

    }
}
