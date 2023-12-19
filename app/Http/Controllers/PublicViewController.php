<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProfanityDetected;


class PublicViewController extends Controller
{
    public function showList()
    {
        $data_buku = Buku::all();
        return view('buku.list_buku', compact('data_buku'));
    }
    public function showDetail(string $id)
    {
        $buku = Buku::with('ratings')->find($id);
        $reviews = Review::where('buku_id', $buku->id)->where('status', 'approved')->get();

        if ($buku->ratings->isNotEmpty()) {
            $buku_rating = $buku->ratings->avg('value');
        } else {
            $buku_rating = null;
        }
        $categories = Category::all();
        return view('buku.detail', compact('buku', 'buku_rating', 'categories', 'reviews'));
    }
    public function showListPopuler()
    {
        $data_buku = Buku::withCount('ratings as average_rating')
        ->orderByDesc('average_rating')
        ->limit(10)
        ->get();

        return view('buku.list_buku_populer', compact('data_buku'));
    }
    public function addReview(Request $request, $id)
    {
        $request->validate([
            'review' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        $buku = Buku::findOrFail($id);

        $review = new Review([
            'user_id' => auth()->id(),
            'buku_id' => $buku->id,
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        $review->save();

        if ($review->status === 'profanity_detected') {
            Notification::route('mail', config('mail.admin_email'))->notify(new ProfanityDetected($review));
        }

        return redirect()->route('buku.show', $buku->id)->with('success', 'Review added successfully.');
    }
}
