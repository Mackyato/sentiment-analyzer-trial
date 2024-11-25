@extends('layouts.app')

@section('title', 'History')

@section('content')
    <h1>Analysis History</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Text</th>
                <th>Positive</th>
                <th>Negative</th>
                <th>Neutral</th>
                <th>Overall Sentiment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sentiments as $sentiment)
                <tr>
                    <td>{{ $sentiment->text }}</td>
                    <td>{{ $sentiment->positive_count }}</td>
                    <td>{{ $sentiment->negative_count }}</td>
                    <td>{{ $sentiment->neutral_count }}</td>
                    <td>{{ $sentiment->overall_sentiment }}</td>
                    <td>
                        <form action="{{ route('history.destroy', $sentiment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
