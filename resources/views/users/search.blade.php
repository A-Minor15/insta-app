@extends('layouts.app')

@section('title', 'Explore People')

@section('content')
    <div class="row justify-content-center">
        <div class="col-5">
            <p class="h5 text-muted mb-4">Search results for <span class="fw-bold">{{ $search }}</span></p>
        </div>

        @forelse ($users as $user)
            <div class="row align-items-center mb-3">
                <div class="col-auto">
                    @if ($user->avatar)
                        <a href="{{ route('profile.show', $user->id) }}">
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle avatar-md">
                        </a>
                    @else
                        <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                    @endif
                </div>
                <div class="col-ps-0">
                    <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a>
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
                <div class="col-auto">
                    @if ($user->id !== Auth::user()->id)
                        <form action="{{ route('follow.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary fw-bold btn-sm">Fllowing</button>
                        </form>
                    @else
                        <form action="{{ route('follow.store', $user->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary fw-bold btn-sm">Follow</button>
                        </form>

                    @endif
                </div>
            </div>
        @empty

        @endforelse
    </div>
@endsection
