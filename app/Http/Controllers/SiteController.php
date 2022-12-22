<?php

namespace App\Http\Controllers;

use App\Models\Plan;

class SiteController extends Controller
{
	public function index(){
		$plans = Plan::with('details')->limit(3)->get();
		return view('site.home.index', compact('plans'));
	}

	public function plan($url)
	{
		$plan = Plan::where('url', $url)->first();
		if (!$plan)
			return redirect()->back();
		session()->put('plan', $plan);
		return redirect()->route('register');
	}
}
