<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sentiment extends Model
{
    public function history()
    {
        $sentiments = Sentiment::all();
        return view('history', compact('sentiments'));
    }
    
}
