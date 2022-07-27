@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.income.title') }}
@stop

@section('content-wrapper')
    <div class="content full-page">
        <table-component data-src="{{ route('admin.income.index') }}">
            <template v-slot:table-header>
                <h1>
                    {!! view_render_event('admin.income.index.header.before') !!}

                    {{ Breadcrumbs::render('income') }}

                    {{ __('admin::app.income.title') }}

                    {!! view_render_event('admin.income.index.header.after') !!}
                </h1>
            </template>

            @if (bouncer()->hasPermission('income.create'))
                <template v-slot:table-action>
                    <a href="{{ route('admin.income.create') }}" class="btn btn-md btn-primary">{{ __('admin::app.income.create-title') }}</a>
                </template>
            @endif
        <table-component>
    </div>
@stop
