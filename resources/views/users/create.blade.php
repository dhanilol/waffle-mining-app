@extends('templates.template')

@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (isset($user))
                {{ __('Edit User') }}
            @else
                {{ __('Create User') }}
            @endif
        </h2>
    </x-slot>
    <div class="mt-5 col-md-6 offset-md-3">
        <div class="card">
            <div class="card-body">
                <!-- Validation Errors -->
                
                @if (isset($user))
                    <form name="formEditUser" class="edit-user-form" id="form-edit-user" method="POST" action="{{ url("users/$user->id") }}">
                        @method('PUT')
                @else
                    <form name="formAddUser" id="form-add-user" method="POST" action="{{ url("users") }}">
                @endif
                    @csrf
    
                    <!-- Username -->
                    <div>
                        <x-label for="username" :value="__('Username')" />
    
                        <x-input id="username" class="block mt-1 w-full" type="text" name="username" value="{{ $user->username ?? null }}" required autofocus />
                    </div>
    
                    <!-- Name -->
                    <div>
                        <x-label for="name" :value="__('Name')" />
    
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name ?? null }}" required />
                    </div>
    
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />
    
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email ?? null }}" required />
                    </div>
    
                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />
    
                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>
    
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
    
                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>
    
                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('users') }}">
                            {{ __('Back') }}
                        </a>
    
                        <x-button class="user-edit ml-4">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

@isset($user)
    <script>
    if (document.querySelector('.edit-user-form')) {
        (function(){
        $('form[name="formEditUser"]').on('submit', function(event){
            event.preventDefault();

            $.ajax({
            url: '{{ url("users/$user->id") }}',
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert(response);
            },
            error: function(error) {
                alert(error);
            }
            });
        });
        });
    }
    </script>
@endisset
@endsection