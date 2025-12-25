<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\Definition;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TermController extends Controller
{
    public function index(Request $request)
    {
        $query = Term::with(['category', 'creator'])
            ->where('is_approved', true);

        // Search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description_short', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $terms = $query->orderBy('created_at', 'desc')->paginate(20);

        return response()->json($terms);
    }

    public function show($slug)
    {
        $term = Term::with([
            'category',
            'creator',
            'approvedDefinitions.user',
            'approvedDefinitions.votes'
        ])
        ->where('slug', $slug)
        ->where('is_approved', true)
        ->firstOrFail();

        // Get the best definition (highest score) for the hero section
        $bestDefinition = $term->approvedDefinitions->first();

        // Add the best definition to the response
        $termArray = $term->toArray();
        $termArray['best_definition'] = $bestDefinition;

        return response()->json($termArray);
    }

    public function incrementView(Request $request, $slug)
    {
        $term = Term::where('slug', $slug)->firstOrFail();

        // Increment views for all approved definitions
        $definitionIds = $request->input('definition_ids', []);

        if (!empty($definitionIds)) {
            Definition::whereIn('id', $definitionIds)
                ->where('term_id', $term->id)
                ->where('is_approved', true)
                ->increment('views_count');
        }

        return response()->json(['message' => 'Views incremented']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $term = Term::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'category_id' => $validated['category_id'],
            'is_approved' => true,
            'created_by_id' => $request->user()->id,
        ]);

        return response()->json($term, 201);
    }

    public function update(Request $request, $id)
    {
        $term = Term::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'category_id' => 'sometimes|exists:categories,id',
            'is_approved' => 'sometimes|boolean',
        ]);

        if (isset($validated['title'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $term->update($validated);

        return response()->json($term);
    }

    public function destroy(Request $request, $id)
    {
        $term = Term::findOrFail($id);
        $term->delete();

        return response()->json(['message' => 'Term deleted successfully']);
    }
}
