<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $film_id) {
        $request->validate([
            'content' => 'required|min:3',
            'point' => 'required'
        ],
    [
        'required' => 'inputan :attribute harus diisi',
        'min' => 'inputan :attribute minimal 3 karakter'
    ]);

    $user_id = Auth::id();

    $review = new Review;

    $review->user_id = $user_id;
    $review->film_id = $film_id;
    $review->content = $request['content'];
    $review->point = $request['point'];
    
    $review->save();

    return redirect('/film/' . $film_id);

    }
}
