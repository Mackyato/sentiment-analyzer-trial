<!DOCTYPE html>
<html>
<head>
    <title>Sentiment Analysis Result</title>
</head>
<body>
    <h1>Analysis Result</h1>
    <p><strong>Text:</strong> {{ $text }}</p>
    <p><strong>Positive Words:</strong> {{ implode(', ', $positives) }}</p>
    <p><strong>Negative Words:</strong> {{ implode(', ', $negatives) }}</p>
    <p><strong>Neutral Words:</strong> {{ implode(', ', $neutrals) }}</p>
    <p><strong>Positive Count:</strong> {{ $positiveCount }}</p>
    <p><strong>Negative Count:</strong> {{ $negativeCount }}</p>
    <p><strong>Neutral Count:</strong> {{ $neutralCount }}</p>
    <a href="{{ route('history') }}">View History</a>
</body>
</html>
