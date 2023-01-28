@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('admin.posts.update', $single_post_edit['id']) }}">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input value="{{ $single_post_edit['title'] }}" name="title" type="string" class="form-control">
            @error('title')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input value="{{ $single_post_edit['description'] }}" name="description" type="text" class="form-control">
        </div>
        @error('description')
            <div>
                {{ $message }}
            </div>
        @enderror

        {{-- INVIO --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
