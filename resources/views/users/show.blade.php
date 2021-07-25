@extends('templates.template')

@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('View User') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="card" style="width: 25rem;">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        {{ $user->name }}
                                    </h4>
                                </div>
                                <img src="https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg" class="card-img-top" alt="profile-pic">
                                <div class="card-body">
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                    
                                </div>
                                <div class="card-footer text-center">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('users') }}">
                                        {{ __('Back') }}
                                    </a>
                                    <a href="{{ url("users/$user->id/edit") }}">
                                        <button class="btn btn-primary btn-sm ml-3 btn-block">Edit</button>
                                    </a>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
