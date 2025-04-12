<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use Illuminate\Support\Facades\Config;

class TestController extends Controller
{
    /**
     * Show the user's profile settings page.
     */
    // public function edit(Request $request): Response
    // {
    //     return Inertia::render('settings/Profile', [
    //         'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
    //         'status' => $request->session()->get('status'),
    //     ]);
    // }

    public function test(Request $request): Response
    {

        // dump('test');
        // die;
        dump(Config::get('app.env'));
        // Config::get('app.name')
        die;
    }

    /**
     * Update the user's profile information.
     */

}
