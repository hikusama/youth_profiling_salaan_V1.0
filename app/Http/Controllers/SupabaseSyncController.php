<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 
use Illuminate\Support\Facades\Http;

class SupabaseSyncController extends Controller
{
    public function fetch()
    {
        // $table = htmlspecialchars(trim($table));

        // if ($table === "") {
        //     return response()->json([
        //         'message' => 'No table given.'
        //     ], 400);
        // }

        $url = 'https://xqqwrdmvqmjrrlckfimb.supabase.co/rest/v1/post'; 
        $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InhxcXdyZG12cW1qcnJsY2tmaW1iIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NDQ5NTMyODcsImV4cCI6MjA2MDUyOTI4N30.0rfMHpHOAdphDATIx5QlbNhs_2j7lK_P4jwhnrenzuA';
    
        $response = Http::timeout(30)->withHeaders([
            'apikey' => $apiKey,
            'Authorization' => 'Bearer ' . $apiKey,
        ])->get($url, [
            'select' => '*'
        ]);
    
        return response()->json($response->json());
    }
}

