@extends('layout')
@section('section')

    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach

    <h1>Announcements</h1>
    <div class="d-grid gap-2">
        @foreach($announcements as $item)
            <div class="note">
                <p>
                    <span class="date">{{ $item->updated_time }}</span>
                    <span class="name">{{ $item->name }}</span>
                </p>
                <p> {{ $item->body }} </p>
                <a href="{{ route('update', ['id' => $item->id]) }}" @class(['btn', 'btn-dark', 'disabled' => ((strtotime(\Carbon\Carbon::now()) - strtotime($item->updated_time)) < 86400)])>up</a>
            </div>
        @endforeach

        <div id="">
            <form action="{{ route('store') }}" method="POST">

                @csrf

                <p><input class="form-control" name="name"></p>
                <p><textarea class="form-control" name="body"></textarea></p>
                <p><input type="form-control" class="d-none" name="updated_time" value="{{ Carbon\Carbon::now() }}"></p>
                <p><input type="form-control" class="d-none" name="heading_id" value="{{ $heading }}"></p>
                <p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
            </form>
        </div>
    </div>

@endsection
