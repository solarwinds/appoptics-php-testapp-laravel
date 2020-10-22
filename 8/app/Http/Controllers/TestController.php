<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function nosetest() {
        // events
        event(new \App\Events\NoseEvent('hello from nosetests'));

        // mysql
        $sql = new \App\Nosetest([
            'first_name' => 'FirstN',
            'last_name' => 'LastN',
            'email' => 'EmailA',
            'job_title' => 'Title',
            'city' => 'City',
            'country' => 'Country'
        ]);
        $sql->save();
        $sql->first_name = 'FirstN_Updated';
        $sql->save();
        \Illuminate\Support\Facades\DB::table('nosetests')->get();
        $sql->delete();

        // cache
        \Illuminate\Support\Facades\Cache::put('my-key', 'value', now()->addMinutes(10));
        \Illuminate\Support\Facades\Cache::get('my-key');
        \Illuminate\Support\Facades\Cache::has('my-key-2');
        \Illuminate\Support\Facades\Cache::increment('my-key');
        \Illuminate\Support\Facades\Cache::decrement('my-key');
        \Illuminate\Support\Facades\Cache::forget('my-key');
        \Illuminate\Support\Facades\Cache::flush();

        return view('welcome');
    }

    public function nosetestError() {
        throw new \RuntimeException('nosetest error message');

        return view('welcome');
    }
}
