<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    /**
     * Display token details and its hash.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // Get the current authenticated user
        $user = Auth::user();
        
        // Get the user's first token
        $token = $user->tokens->first();

        if ($token) {
            // Extract the plain text token
            $plainTextToken = $token->plainTextToken;
            
            // Calculate hash of the token
            $hashedToken = hash('sha256', $plainTextToken);

            return response()->json([
                'plain_text_token' => $plainTextToken,
                'hashed_token' => $hashedToken,
                'stored_hashed_token' => $token->token, // Adjust if token column name is different
            ]);
        }

        return response()->json(['error' => 'No token found'], 404);
    }
}