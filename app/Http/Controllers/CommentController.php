<?php

// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Jual;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $jual_id)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->jual_id = $jual_id;
        $comment->user_id = auth()->id();
        $comment->save();

        return redirect()->route('jual.show', $jual_id)->with('success', 'Komentar berhasil ditambahkan');
    }
}
