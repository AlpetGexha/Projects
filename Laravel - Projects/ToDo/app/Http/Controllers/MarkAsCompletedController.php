<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;

class MarkAsCompletedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {

        $x =  Todo::find($id)->update(['com' => 1]);
        if ($x)
            return redirect(route('todos.index'))->with('status', 'Iteam was Completet');
        else
            return redirect()->back()->with('status', 'Iteam wasent Completeted plz try again');
    }
}
