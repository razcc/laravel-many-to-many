@extends('layouts.app')

@section('content')
<div>
    <h3>
        <a href="{{ route('admin.posts.create') }}">Create post</a>
    </h3>
</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Actioon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_post as $post )
            <tr>
                <td>{{ $post['id'] }}</td>
                {{-- Show --}}
                <td>
                    <a href="{{ route('admin.posts.show', $post['id']) }}">
                        {{ $post['title'] }}
                    </a>       
                </td>
                <td>{{ $post['description'] }}</td>
                
                {{-- Edit --}}
                <td>
                    <a href="{{ route('admin.posts.edit', $post['id']) }}">Edit</a>    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $all_post->links() }}
@endsection
