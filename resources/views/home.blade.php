@extends('layouts.app')

@section('content')
    @if(session()->get('success'))
        <div class="w3-container">
            <div class="w3-panel w3-display-container w3-padding-16 w3-light-blue w3-text-white">
                <span onclick="this.parentElement.style.display='none'" class="w3-button w3-hover-light-blue w3-hover-text-blue w3-large w3-display-topright">&times;</span>
                <strong>{{ session()->get('success') }}</strong>
            </div>
        </div>
    @endif
    <div class="w3-container">
        <form method="POST" action="{{ route('post.store') }}">
            @csrf
            <div class="w3-row w3-margin-top w3-margin-bottom">
                <div class="w3-rest">
                    <textarea id="content" name="content" class="w3-input w3-border" placeholder="Update a status..." required></textarea>
                </div>
            </div>
            <div class="w3-row w3-margin-bottom w3-right">
                <button type="submit" class="w3-button w3-cyan w3-text-white w3-hover-light-blue w3-hover-text-white w3-padding" style="min-width: 100px">Update</button>
            </div>
        </form>
    </div>
    <div class="w3-container">
        @foreach($posts as $post)
            <div class="w3-row w3-margin-bottom w3-white">
                <div class="w3-col w3-margin w3-hide-small {{ ($post->isAuth) ? 'w3-right' : '' }}" style="max-width: 70px">
                    <img src="{{ $post->user->profile_picture ? $post->user->profile_picture : asset('img/no_avatar.jpg') }}" class="w3-image w3-circle">
                </div>
                <div class="w3-rest w3-margin {{ ($post->isAuth)? 'w3-right-align' : '' }}">
                    <strong>{{ $post->user->name }}</strong>&emsp;<em class="w3-small w3-text-grey w3-hide-small" title="{{ $post->created_at->format('g:i A - l, j M Y') }}">{{ $post->created_at->diffForHumans() }}</em>
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="w3-container">
        <hr class="w3-border-gray">
        <em class="w3-small w3-text-gray w3-right">{{ \Illuminate\Foundation\Inspiring::quote() }}</em>
    </div>
@endsection
