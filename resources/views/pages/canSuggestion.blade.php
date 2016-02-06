@extends('layouts.master')

@section('content')
    <div class="full-color mar-top-50">

        <header class="Header-favorite">
            <div class="Banner">
                <h1 class="Banner__heading utility-center">
                    Suggestion
                    <span class="utility-text-little utility-muted">
                      Some suggested Book
                    </span>
                </h1>
            </div>
        </header>

        <ul>
        @foreach($items as $item)
            <li>{{ $item['col1'] }} - {{ $item['col2'] }}</li>
        @endforeach
        </ul>
    </div>
@endsection