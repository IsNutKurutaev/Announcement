@extends('layout')
@section('section')
        <h1>Headings</h1>
        <div class="d-grid gap-2">
            @foreach($headings as $item)
                <a href="create/{{ $item->name }}" class="btn btn-dark block">{{ $item->name }}</a>
            @endforeach
        </div>
@endsection
