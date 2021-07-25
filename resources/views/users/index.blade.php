@extends('templates.template')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ url("users/create") }}">
                                <button class="btn btn-success">Create</button>
                            </a>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            @csrf
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->id }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            {{-- <td><x-button id="edit">Edit</x-button> </td> --}}
                                            <td>
                                                <a href="{{ url("users/$user->id") }}">
                                                    <button class="btn btn-primary">View</button>
                                                </a>

                                                <a href="{{ url("users/$user->id/edit") }}">
                                                    <button class="btn btn-success">Edit</button>
                                                </a>

                                                <a href="{{ url("users/$user->id") }}" class="user-delete">
                                                    <button class="btn btn-danger">Delete</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
