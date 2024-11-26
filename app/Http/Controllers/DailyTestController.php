<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyTestController extends Controller
{
    public function pscpCabin()
    {
        return view('daily-test.x-ray.pscpcabin.pscp');
    }

    public function hbscpBagasi()
    {
        return view('daily-test.x-ray.hbscpbagasi.hbscp');
    }

    public function wtmdPosTimur()
    {
        return view('daily-test.wtmd.wtmdpostimur');
    }

    public function wtmdPscpUtara()
    {
        return view('daily-test.wtmd.wtmdpscputara');
    }

    public function wtmdPscpSelatan()
    {
        return view('daily-test.wtmd.wtmdpscpselatan');
    }

    public function hhmdLayout()
    {
        return view('daily-test.hhmd');
    }
}
