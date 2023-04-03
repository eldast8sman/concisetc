@extends('layouts.admin.backup_app')

@section('title')
    Concise Admin || Services
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            @component('admin.components.breadcrumbs')
                @slot('page_header')
                    Services
                @endslot
                @slot('page_desc')
                    {{ $service->title }}
                @endslot
                @slot('other_links')
                    <li class="breadcrumb-item"><a href="{{ env('ADMIN_URL') }}services">Services</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $service->title }}</a></li>
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-12">
                    @component('admin.components.cards')
                        @slot('title')
                            {{ $service->title }}
                        @endslot
                        @slot('body')
                            @if (!empty($service->filename))
                                <div class="col-lg-6 col-md-9 col-sm-12 mx-auto my-3">
                                    <img src="{{ $service->filename }}" alt="{{ $service->title }}" style="
                                        width: 600px;
                                        max-width: 90%;
                                        height: auto;
                                        margin: 0 auto;
                                    ">
                                </div>
                            @endif
                            <div class="col-lg-9 col-md-12 mx-auto text-justify text-dark">
                                <p>
                                    <strong>Summary: </strong>{{ $service->summary }}
                                </p>
                                <p>
                                    <strong>Content: </strong>{{ $service->content }}
                                </p>
                                <p>
                                    <strong>Solution Provided: </strong>{{ $service->solution }}
                                </p>
                                <p>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_service_modal">Edit</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_service_modal">Delete</button>

                                    @component('admin.components.long_modal')
                                        @slot('modal_id')
                                            edit_service_modal
                                        @endslot
                                        @slot('modal_title')
                                            Edit Service
                                        @endslot
                                        @slot('modal_body')
                                            <div class="col-12 py-3">
                                                @component('admin.components.service_form')
                                                    @slot('data_id')
                                                        {{ $service->id }}
                                                    @endslot
                                                    @slot('title_value')
                                                        {{ $service->title }}
                                                    @endslot
                                                    @slot('summary_value')
                                                        {{ $service->summary }}
                                                    @endslot
                                                    @slot('content_value')
                                                        {{ $service->content }}
                                                    @endslot
                                                    @slot('solution_value')
                                                        {{ $service->solution }}
                                                    @endslot
                                                @endcomponent
                                            </div>
                                        @endslot
                                    @endcomponent
                                    @component('admin.components.small_modal')
                                        @slot('modal_id')
                                            delete_service_modal
                                        @endslot
                                        @slot('modal_title')
                                            Delete {{ $service->title }}
                                        @endslot
                                        @slot('modal_body')
                                            Do you really want to delete {{ $service->title }} as a Service from this Website? <br />
                                            Please note that this is not reversible
                                            <p class="text-center">
                                                <button class="btn btn-danger mt-4" data-id="{{ $service->id }}" id="delete_service">Delete</button>
                                            </p>
                                        @endslot
                                    @endcomponent
                                </p>
                            </div>
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection