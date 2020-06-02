<?php

namespace Nexo\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getIndex()
    {
        $profile = \Sentinel::getUser();
        return view('profile.show', compact('profile'));
    }
}
