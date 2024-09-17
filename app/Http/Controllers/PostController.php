<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function update(Request $request, Post $post)
    {
        // ตรวจสอบสิทธิ์การอัพเดทโพสต์
        $this->authorize('update', $post);

        // อัพเดทข้อมูลโพสต์ตามข้อมูลที่ได้รับจาก request
        $post->update($request->all());

        return response()->json([
            'message' => 'Post updated successfully!',
            'post' => $post,
        ]);
    }
}