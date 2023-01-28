@extends('layouts.app')

@section('content')
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
            <tr>
                <td>{{ $single_post['id'] }}</td>
                <td>{{ $single_post['title'] }}</td>
                <td>{{ $single_post['description'] }}</td>
                
                {{-- Edit --}}
                <td>
                    <a href="{{ route('admin.posts.edit', $single_post['id']) }}">Edit</a>    
                </td>
            </tr>

        </tbody>
    </table>
@endsection
