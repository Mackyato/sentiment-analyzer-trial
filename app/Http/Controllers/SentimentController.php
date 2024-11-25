<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sentiment;

class SentimentController extends Controller
{
    public function index()
    {
        // Render the form without results
        return view('analyze');
    }
    

    public function analyze(Request $request)
    {
        $text = $request->input('text');

        // Dummy word lists for demonstration
        $positiveWords = ['love', 'happy', 'amazing', 'excellent', 'great'];
        $negativeWords = ['sad', 'bad', 'terrible', 'poor', 'horrible'];

        $positiveCount = 0;
        $negativeCount = 0;
        $neutralCount = 0;

        $positives = [];
        $negatives = [];
        $neutrals = [];

        $words = explode(' ', strtolower($text));
        foreach ($words as $word) {
            if (in_array($word, $positiveWords)) {
                $positiveCount++;
                $positives[] = $word;
            } elseif (in_array($word, $negativeWords)) {
                $negativeCount++;
                $negatives[] = $word;
            } else {
                $neutralCount++;
                $neutrals[] = $word;
            }
        }

        // Determine overall sentiment
        $overallSentiment = 'Neutral';
        if ($positiveCount > $negativeCount) {
            $overallSentiment = 'Positive';
        } elseif ($negativeCount > $positiveCount) {
            $overallSentiment = 'Negative';
        }

        // Save the data to the database
        $sentiment = new Sentiment();
        $sentiment->text = $text;
        $sentiment->positive_count = $positiveCount;
        $sentiment->negative_count = $negativeCount;
        $sentiment->neutral_count = $neutralCount;
        $sentiment->positive_words = json_encode($positives);
        $sentiment->negative_words = json_encode($negatives);
        $sentiment->neutral_words = json_encode($neutrals);
        $sentiment->overall_sentiment = $overallSentiment; // Set the overall sentiment
        $sentiment->save();

        return view('analyze', compact('text', 'positiveCount', 'negativeCount', 'neutralCount', 'positives', 'negatives', 'neutrals'));
    }

    public function history()
    {
        $sentiments = Sentiment::all(); // Fetch all records from the database
        return view('history', compact('sentiments'));
    }

    public function destroy($id)
    {
        Sentiment::findOrFail($id)->delete(); // Delete the record
        return redirect()->route('history')->with('success', 'Record deleted successfully!');
    }
}
