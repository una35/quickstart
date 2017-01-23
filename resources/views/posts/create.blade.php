@extends('layout.default')

@section('title')
    Add new
@endsection

@section('content')

    <h1>

        <a href="{{ url('/') }}" class="back">Back</a>

        Add New
    </h1>

    <form method="post" action="{{ url('/posts') }}">
      {{ csrf_field() }}

        <p><input type="text" name="title" placeholder="title" value="{{ old( 'title' ) }}"></p>
            @if($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
            @endif

        <p><textarea name="content" placeholder="content">{{ old( 'content' ) }}</textarea></p>
            @if($errors->has('content'))
                <span class="error">{{ $errors->first('content') }}</span>
            @endif

        <p><input type="submit" value="add new"></p>

    </form>
@endsection