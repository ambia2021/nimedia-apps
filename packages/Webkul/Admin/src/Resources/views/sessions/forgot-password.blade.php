@extends('admin::layouts.anonymous-master')

@section('page_title')
    {{ __('admin::app.sessions.forgot-password.title') }}
@stop

@section('content')

<div class="flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center">
    <div>
        <h1 class="text-white font-bold text-4xl font-sans">Nimedia Apps</h1>
        <p class="text-white mt-1">All One Apps Solution</p>
    </div>
</div>
<div class="flex w-1/2 justify-center items-center bg-white">
    <form method="POST" action="{{ route('admin.forgot_password.store') }}" @submit.prevent="onSubmit">
        {!! view_render_event('admin.sessions.forgot_password.form_controls.before') !!}

        @csrf

        <h1 class="text-gray-800 font-bold text-2xl mb-1">Lupa password?</h1>
        <p class="text-sm font-normal text-gray-600 mb-7">silahkan isi email anda</p>
        <div :class="[errors.has('email') ? 'has-error' : '']"
            class="flex items-center border-2 py-2 px-3 rounded-xl mb-4 focus-within:ring-2 focus-within:ring-indigo-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
            </svg>
            <input class="pl-2 outline-none border-none" type="email"
            name="email"
            class="control"
            id="email"
            value="{{ old('email') }}"
            v-validate="'required'"
            data-vv-as="&quot;{{ __('admin::app.sessions.forgot-password.email') }}&quot;" placeholder="Email Address" />
        </div>

        {!! view_render_event('admin.sessions.forgot_password.form_buttons.before') !!}
        <button type="submit" class="block w-full bg-indigo-600 hover:bg-indigo-900 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Setel ulang password</button>
        {!! view_render_event('admin.sessions.forgot_password.form_controls.after') !!}
                

          

        <a href="{{ route('admin.session.create') }}" class="mx-auto my-5 flex text-sm">Kembali</a>
    </form>
</div>

@stop