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
                {{-- <th scope="col">Creatore Post</th> --}}
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">CategoryID</th>
                <th scope="col">Tags</th>
                <th scope="col">Actioon</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_post as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>

                    {{-- Show --}}
                    <td>
                        <a href="{{ route('admin.posts.show', $post['id']) }}">
                            {{ $post['title'] }}
                        </a>
                    </td>
                    <td>{{ $post['description'] }}</td>
                    <td>{{ $post['category']['name'] ?? '' }}</td>

                    {{-- Tags --}}
                    <td>
                        @foreach ($post['tags'] as $elem )
                            {{$elem['name']}}
                        @endforeach

                    </td>

                    {{-- Edit --}}
                    <td>
                        <a href="{{ route('admin.posts.edit', $post['id']) }}">Edit</a>

                        {{-- Destroy --}}
                        <form method="POST" action="{{ route('admin.posts.destroy', $post['id']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Destroy</button>
                        </form>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $all_post->links() }}
@endsection
