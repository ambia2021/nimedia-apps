@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.expenses.title') }}
@stop

@section('content-wrapper')
    <div class="content full-page">
        <table-component data-src="{{ route('admin.expenses.index') }}">
            <template v-slot:table-header>
                <h1>
                    {!! view_render_event('admin.expenses.index.header.before') !!}

                    {{ Breadcrumbs::render('expenses') }}

                    {{ __('admin::app.expenses.title') }}

                    {!! view_render_event('admin.expenses.index.header.after') !!}
                </h1>
            </template>

            @if (bouncer()->hasPermission('expenses.create'))
                <template v-slot:table-action>
                    <a href="{{ route('admin.expenses.create') }}" class="btn btn-md btn-primary">{{ __('admin::app.expenses.create-title') }}</a>
                </template>
            @endif
        <table-component>
    </div>
@stop
