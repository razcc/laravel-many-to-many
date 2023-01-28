@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('admin.posts.store') }}">
        @csrf

        {{-- Title --}}
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="string" class="form-control">

        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input name="description" type="text" class="form-control">
        </div>


        {{-- INVIO --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
