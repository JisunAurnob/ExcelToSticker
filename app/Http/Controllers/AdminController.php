<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Token;
use App\Models\Admin;
use DateTime;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this-> middleware('auth');
    }
    public function adminPanel()
    {
        $tokens = array();
        $tokens = Token::all();
        return view('pages.adminPanel')->with('tokens', $tokens);
    }
    public function tokenGenerate(Request $request)
    {
        $new_tokens = array();
        for ($i = 0; $i < ($request->numberOfToken); $i++) {
            $new_tokens[$i] = Str::random(12);
            $token = new Token();
            $token->token = $new_tokens[$i];
            $token->status = 'available';
            $token->created_at = new DateTime();
            $token->save();
        }
        return redirect()->route('admin');
    }
    public function updateTokenStatus(Request $request)
    {
        $token = Token::where('token_id', $request->token_id)
            ->where('status', 'available')
            ->first();
        $token->status = 'reserved';
        $token->updated_at = new DateTime();
        $token->save();
        return redirect()->route('admin');
    }
}
