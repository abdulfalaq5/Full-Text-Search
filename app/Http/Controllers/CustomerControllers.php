<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Str;

class CustomerControllers extends Controller
{
    public function index()
    {
        //return Benchmark::dd(fn () => Customer::search('john')->get());
       //waktu 2,624.128ms

       //mencari rata" aktu dengan 10 kali iterasi
        return Benchmark::dd(fn () => Customer::search(Str::random(4))->get(), iterations: 10);
        //waktu 2,189.369ms
    }
}
