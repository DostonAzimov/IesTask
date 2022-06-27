<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WoisDomainController extends Controller
{
    public function whoisdomaincheck()
    {
        if (isset($_GET['domain'])) {
            $domain = $_GET['domain'];
            if (gethostbyname($domain) != $domain) {
                session()->flash('message','Domain already registered!');
            } else {
                session()->flash('message','This domain available, You can register it!');
            }
        }
        return view('livewire.domen-component');
    }
}
