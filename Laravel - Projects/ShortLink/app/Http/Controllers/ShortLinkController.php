<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Save url to database
     *
     * @return void
     */
    public function store(Request $r)
    {
        // validate the data
        $r->validate([
            'url' => 'required|url',
        ]);

        $code = null;
        $exists = ShortLink::where('url', $r->url)->first();

        if ($exists) {
            $code = $exists->first()->code;
        } else {
            $create = ShortLink::create([
                'url' => $r->url,
            ]);
            if ($create) {
                if ($r->code != null) 
                    $code = $r->code;
                else
                    $code = base_convert($create->id, 10, 36);

                ShortLink::where('id', $create->id)->update(['code' => $code]);
            } else {
                return back()->withInput();
            }
            //    dd($r->url);  
        }
        if ($code)
            return to_route('index')->with('status', '<a href="' . route('code', $code) . ' ">' . route('code', $code) . ' </a>');
    }

    /**
     * Redirect to url
     *
     * @param  mixed $code
     * @return void 
     */
    public function redirect($code)
    {
        $link = ShortLink::where('code', $code)->first();

        if ($link)
            return redirect($link->url);
        else
            return to_route('index')->with('status', 'Url dont exist'); 
    }
}
