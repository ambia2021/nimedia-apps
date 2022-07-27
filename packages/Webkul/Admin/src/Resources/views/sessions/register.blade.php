@extends('admin::layouts.anonymous-master')

@section('page_title')
    {{ __('admin::app.sessions.register.title') }}
@stop

@section('content')
    <div class="flex w-1/2 bg-gradient-to-tr from-blue-600 to-blue-400 i justify-around items-center">
        <div>
            <h1 class="text-white font-bold text-4xl font-sans">Nimedia Apps</h1>
            <p class="text-white mt-1">All One Apps Solution</p>
        </div>
    </div>
    <div class="flex w-1/2 justify-center items-center bg-white">
        <form method="POST" action="{{ route('admin.register.create') }}" @submit.prevent="$root.onSubmit">
            {!! view_render_event('admin.sessions.login.form_controls.before') !!}

            @csrf()

            <h1 class="text-gray-800 font-bold text-2xl mb-1">Buat Akun</h1>
            <p class="text-sm font-normal text-gray-600 mb-7">di Nimedia Apps</p>
            <span class="control-error text-sm text-red-500" v-if="errors.has('name')">
                @{{ errors.first('name') }}
            </span>
            <div :class="[errors.has('name') ? 'has-error' : '']"
                class="flex items-center border-2 py-2 px-3 rounded-xl mb-4 focus-within:ring-2 focus-within:ring-indigo-400">
                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg> --}}
                <input class="pl-2 outline-none border-none" type="text" name="name" class="control" id="name"
                    v-validate="'required|min:3'" data-vv-as="&quot;{{ __('admin::app.sessions.register.name') }}&quot;"
                    placeholder="Nama" />
            </div>
            <span class="control-error text-sm text-red-500" v-if="errors.has('email')">
                @{{ errors.first('email') }}
            </span>

            <div :class="[errors.has('email') ? 'has-error' : '']"
                class="flex items-center border-2 py-2 px-3 rounded-xl mb-4 focus-within:ring-2 focus-within:ring-indigo-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                </svg>
                <input class="pl-2 outline-none border-none" type="email" name="email" class="control" id="email"
                    v-validate="'required|email'" data-vv-as="&quot;{{ __('admin::app.sessions.register.email') }}&quot;"
                    placeholder="Email Address" />
            </div>

            <span class="control-error text-sm text-red-500" v-if="errors.has('password')">
                @{{ errors.first('password') }}
            </span>
            <div :class="[errors.has('password') ? 'has-error' : '']"
                class="flex items-center border-2 py-2 px-3 rounded-xl focus-within:ring-2 focus-within:ring-indigo-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clip-rule="evenodd" />
                </svg>
                <input class="pl-2 outline-none border-none control" type="password" name="password" class="control"
                    id="password" v-validate="'required|min:6'" ref="password"
                    data-vv-as="&quot;{{ __('admin::app.sessions.register.password') }}&quot;" placeholder="Password" />
            </div>
            <span class="control-error text-sm text-red-500" v-if="errors.has('confirm_password')">
                @{{ errors.first('confirm_password') }}
            </span>
            <div class="flex items-center border-2 py-2 px-3 rounded-xl focus-within:ring-2 focus-within:ring-indigo-400"
                :class="[errors.has('confirm_password') ? 'has-error' : '']">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clip-rule="evenodd" />
                </svg>  
                <input type="password" class="control" name="confirm_password"
                    placeholder="{{ __('admin::app.settings.users.confirm_password') }}"
                    v-validate="'required|confirmed:password'"
                    data-vv-as="{{ __('admin::app.settings.users.password') }}" />

            </div>

            {!! view_render_event('admin.sessions.login.form_controls.after') !!}
        
            
            {!! view_render_event('admin.sessions.login.form_buttons.before') !!}
            <button type="submit"
                class="block w-full bg-blue-600 hover:bg-indigo-900 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">register</button>
            {!! view_render_event('admin.sessions.login.form_buttons.after') !!}

        </form>
        <div class="flex justify-between">
            <a href="{{ route('admin.session.create') }}" class="mx-auto my-5 flex text-sm">Kembali</a>
        </div>
    </div>
    {{-- <div class="form-container">
                <h1>{{ __('admin::app.sessions.register.welcome') }}</h1>

                <form method="POST" action="{{ route('admin.session.store') }}" @submit.prevent="$root.onSubmit">
                    {!! view_render_event('admin.sessions.register.form_controls.before') !!}

                    @csrf

                    <div class="form-group" :class="[errors.has('email') ? 'has-error' : '']">
                        <label for="email">{{ __('admin::app.sessions.register.email') }}</label>

                        <input
                            type="text"
                            name="email"
                            class="control"
                            id="email"
                            v-validate.disable="'required|email'"
                            data-vv-as="&quot;{{ __('admin::app.sessions.register.email') }}&quot;"
                            />

                        <span class="control-error" v-if="errors.has('email')">
                            @{{ errors.first('email') }}
                        </span>
                    </div>

                    <div class="form-group" :class="[errors.has('password') ? 'has-error' : '']">
                        <label for="password">{{ __('admin::app.sessions.register.password') }}</label>

                        <input
                            type="password"
                            name="password"
                            class="control"
                            id="password"
                            v-validate.disable="'required|min:6'"
                            data-vv-as="&quot;{{ __('admin::app.sessions.register.password') }}&quot;"
                        />

                        <span class="control-error" v-if="errors.has('password')">
                            @{{ errors.first('password') }}
                        </span>
                    </div>

                    {!! view_render_event('admin.sessions.register.form_controls.after') !!}

                    <a href="{{ route('admin.forgot_password.create') }}">{{ __('admin::app.sessions.register.forgot-password') }}</a>

                    <div class="button-group">
                        {!! view_render_event('admin.sessions.register.form_buttons.before') !!}

                        <button type="submit" class="btn btn-xl btn-primary">
                            {{ __('admin::app.sessions.register.register') }}
                        </button>

                        {!! view_render_event('admin.sessions.register.form_buttons.after') !!}
                    </div>
                </form>
            </div>
        </div>
    </div> --}}


@stop

@push('scripts')
    <script>
        $(() => {
            $('input').keyup(({
                target
            }) => {
                if ($(target).parent('.has-error').length) {
                    $(target).parent('.has-error').addClass('hide-error');
                }
            });

            $('button').click(() => {
                $('.hide-error').removeClass('hide-error');
            });
        });
    </script>
@endpush
