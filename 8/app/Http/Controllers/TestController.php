<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Events\NoseEvent;
use App\Models\Nosetest;
use \Illuminate\Support\Facades\Cache;
use \Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function nosetest() {
        // Push a NoseEvent for Listeners
        event(new NoseEvent('hello from nosetests'));

        // mysql
        $sql = new Nosetest([
            'first_name' => 'FirstN',
            'last_name' => 'LastN',
            'email' => 'EmailA',
            'job_title' => 'Title',
            'city' => 'City',
            'country' => 'Country'
        ]);
        // insert the entry to database
        $sql->save();
        // change first name
        $sql->first_name = 'FirstN_Updated';
        // insert the entry to database
        $sql->save();
        // get from nosetests database
        DB::table('nosetests')->get();
        $sql->delete();

        // Cache
        Cache::put('my-key', 'value', now()->addMinutes(10));
        Cache::get('my-key');
        Cache::has('my-key-2');
        Cache::increment('my-key');
        Cache::decrement('my-key');
        Cache::forget('my-key');
        Cache::flush();

        return view('welcome');
    }

    public function nosetestError() {
        throw new \RuntimeException('nosetest error message');

        return view('welcome');
    }

}
