@extends('layout.default')

@section('title')
    Blog Posts
@endsection

@section('content')

    <h1>

        <a href="{{ url('/posts/create') }}" class="back">Add new</a>

        Posts
    </h1>

    <ul>
    @foreach($posts as $post)
      <li>
              <a href=" {{ action('PostController@show', $post->id) }} "> {{$post->title}} </a>
              <a href="{{ action('PostController@edit', $post->id) }}" class="fs12">[Edit]</a>
          <form action="{{ action('PostController@destroy', $post->id) }}" id="form_{{ $post->id }}" method="post" style="display:inline">
    {{ csrf_field() }}
    {{ method_field('delete') }}
      <a href="#" data-id="{{ $post->id }}" onclick="deletePost(this);" class="fs12">[x]</a>
    </form>

      </li>
    @endforeach
    </ul>

    <script>
function deletePost(e) {
  'use strict';

  if (confirm('are you sure?')) {
    document.getElementById('form_' + e.dataset.id).submit();
  }
}
</script>

@endsection
