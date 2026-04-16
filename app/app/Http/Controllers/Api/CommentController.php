<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($productId){
        return Comment::with('user')
            ->where('product_id', $productId)
            ->get();
    }
    public function store(Request $request, $productId){
        return Comment::create([
            'user_id' => $request->user()->id,
            'product_id' => $productId,
            'content' => $request->content,
        ]);
    }
    public function destroy($id){
        $comment = Comment::findOrFail($id);
        if ($comment->user_id !== auth()->id()){
            return response()->json(['message' => 'Forbidden'],403);
        }
        $comment->delete();
        return response()->json(['message' => 'Comment deleted']);
    }
}
