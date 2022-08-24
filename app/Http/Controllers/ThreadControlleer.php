<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadControlleer extends Controller
{
    public function getThreadById(Request $request) {
        $request->validate([
            'id' => 'required|exists:threads,id'
        ]);

        $thread = Thread::find($request->input('id'))->load(['comments' => function($q) {
            $q->with(['children']);
        }]);

        return response()->json([
            'message' => 'Success',
            'data' => $thread,
        ]);
    }
}
