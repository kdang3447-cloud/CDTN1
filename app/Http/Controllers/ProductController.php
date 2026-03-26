<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('viewProduct');
    }

    public function api(Request $request)
    {
        $action = $request->input('action');

        try {
            if ($action === 'get') {
                return response()->json(Book::all());
            }

            if ($action === 'create') {
                $validated = $request->validate([
                    'title' => 'required|string|max:255',
                    'author' => 'required|string|max:255',
                    'category' => 'required|string|max:255',
                    'price' => 'required|numeric|min:0',
                    'stock' => 'required|integer|min:0',
                ]);
                Book::create($validated);
                return response()->json(['ok' => true]);
            }

            if ($action === 'update') {
                $validated = $request->validate([
                    'id' => 'required|integer|exists:books,id',
                    'title' => 'required|string|max:255',
                    'author' => 'required|string|max:255',
                    'category' => 'required|string|max:255',
                    'price' => 'required|numeric|min:0',
                    'stock' => 'required|integer|min:0',
                ]);
                $book = Book::find($validated['id']);
                $book->update($validated);
                return response()->json(['ok' => true]);
            }

            if ($action === 'delete') {
                $request->validate([
                    'id' => 'required|integer|exists:books,id',
                ]);
                Book::destroy($request->input('id'));
                return response()->json(['ok' => true]);
            }

            return response()->json(['error' => 'Invalid action'], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Server error: ' . $e->getMessage()], 500);
        }
    }
}