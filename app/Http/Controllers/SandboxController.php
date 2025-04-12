<?php

namespace App\Http\Controllers;

use App\Facades\AiSingletonFacade;
use App\Services\AiSingleton;
use Illuminate\Http\Request;

class SandboxController extends Controller
{
    public function test(Request $request)
    {
        // dd('working');
        // dd($this->app);
        // dd(app());

        return redirect()->route('view')->with('imageLink', 'new Link');

        dump(AiSingletonFacade::incrementCount());
        dump(AiSingletonFacade::incrementCount());
        dump(AiSingletonFacade::incrementCount());
        die;

        $aiSingleton = app()->get(AiSingleton::class);

        $aiSingleton->incrementCount();
        $aiSingleton->incrementCount();
        $aiSingleton->incrementCount();

        $aiSingleton2 = app()->make(AiSingleton::class);

        dump('$aiSingleton2->getCount()', $aiSingleton2->getCount());
        die;
        return view('sandbox');
    }
}
