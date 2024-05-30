<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {

        try {
            // Validation of product fields
            $request->validate([
                'rating' => 'required|min:1|max:5',
                'summary' => 'required|string|min:1|max:100',
                'review' => 'nullable|string|max:255',
                'nickname' => 'required|string|min:3|max:255',
            ]);

            // Store the valid Review
            Review::create([
                'rating' => $request->rating,
                'summary' => $request->summary,
                'review' => $request->review,
                'nickname' => $request->nickname,
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ]);

            // Confirm transaction
            DB::commit();

            return back()->with('success', 'Your review was CREATED successfully!!');
        } catch (Exception $e) {

            // Rollback transaction
            DB::rollBack();
            return back()->with('error', 'Something went wrong!! The review could not be added');
        }

    }

    public function edit($id){
        $review = Review::findOrFail($id);

        return view('pages.reviews.edit', ['review' => $review]);
    }

    public function update(Request $request, $id){

        try {
            // Validation of product fields
            $request->validate([
                'rating' => 'required|min:1|max:5',
                'summary' => 'required|string|min:1|max:100',
                'review' => 'nullable|string|max:255',
                'nickname' => 'required|string|min:3|max:255',
            ]);

            $review = Review::findOrFail($id);


            // Store the valid Review
            $review->update([
                'rating' => $request->rating,
                'summary' => $request->summary,
                'review' => $request->review,
                'nickname' => $request->nickname,
                'status' => 'under_review',
            ]);

            // Confirm transaction
            DB::commit();

            return back()->with('success', 'Your review was UPDATED successfully!!');
        } catch (Exception $e) {

            // Rollback transaction
            DB::rollBack();
            return back()->with('error', 'Something went wrong!! The review could not be updated');
        }
    }

    public function destroy($id){
        $review = Review::findOrFail($id);
        $review->delete();

        return back()->with('success', 'Review deleted successfully');
    }
}
