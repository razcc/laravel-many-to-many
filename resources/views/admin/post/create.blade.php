@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('admin.posts.store') }}">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="string" class="form-control">
            @error('title')
                <div>
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input name="description" type="text" class="form-control">
        </div>
        @error('description')
            <div>
                {{ $message }}
            </div>
        @enderror

        {{-- Select Categories --}}
        <select name="categoryId">
            <option value="">Scelgi Categoria Post</option>

            @foreach ($categories as $elem )
                <option value="{{ $elem['id'] }}">{{ $elem['name'] }}</option>
            @endforeach
        </select>

        {{-- INVIO --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
