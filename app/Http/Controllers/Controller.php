<?php

namespace App\Http\Controllers;
use Modules\Page\Models\Page;

abstract class Controller
{    
    public function index()
    {
        $pages = Page::with('translations')->latest()->paginate(10);

        return view('admin.pages.index', compact('pages'));
    }
    public function create()
    {
        return view('admin.pages.create');
    }

}