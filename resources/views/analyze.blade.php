@extends('layouts.app')

@section('title', 'Analyze Text')

@section('content')
    <h1>Analyze Sentiment</h1>
    <form action="{{ route('analyze.post') }}" method="POST">
        @csrf
        <textarea name="text" class="form-control mb-3" rows="5" placeholder="Enter text to analyze"></textarea>
        <button type="submit" class="btn btn-primary">Analyze</button>
    </form>

    @if(isset($text))
        <div class="mt-4">
            <h3>Results</h3>
            <p><strong>Input Text:</strong> {{ $text }}</p>
            <p><strong>Positive Words ({{ $positiveCount }}):</strong> {{ implode(', ', $positives) }}</p>
            <p><strong>Negative Words ({{ $negativeCount }}):</strong> {{ implode(', ', $negatives) }}</p>
            <p><strong>Neutral Words ({{ $neutralCount }}):</strong> {{ implode(', ', $neutrals) }}</p>
        </div>
    @endif
@endsection
