<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Term;
use Illuminate\Support\Facades\DB;

// Check terms with multiple approved definitions
$results = DB::table('definitions')
    ->select('term_id', DB::raw('count(*) as total'))
    ->where('is_approved', true)
    ->groupBy('term_id')
    ->having('total', '>', 1)
    ->get();

echo "Termes avec plusieurs définitions approuvées:\n";
echo "=============================================\n";

foreach ($results as $result) {
    $term = Term::find($result->term_id);
    if ($term) {
        echo $term->title . ": " . $result->total . " définitions approuvées\n";
    }
}

echo "\nTotal: " . $results->count() . " termes avec plusieurs définitions\n";
