@extends('layouts.admin.other_app')

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
                    Services Rendered By Concise
                @endslot
                @slot('other_links')
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blogs</a></li>
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-12">
                    @component('admin.components.cards')
                        @slot('title')
                            Services
                        @endslot
                        @slot('body')
                            <p class="py-3">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#add_service_modal">Add Service</button>
                            </p>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-responsive-sm table-striped text-dark">
                                        <thead>
                                            <tr>
                                                <th>Service</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                                <tr>
                                                    <td>{{ $service->title }}</td>
                                                    <td><a href="{{ env('ADMIN_URL') }}/services/{{ $service->slug }}" class="text-primary">More Details</a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @component('admin.components.long_modal')
                                @slot('modal_id')
                                    add_service_modal
                                @endslot
                                @slot('modal_title')
                                    Add a Service
                                @endslot
                                @slot('modal_body')
                                    <div class="col-12 py-3">
                                        @component('admin.components.service_form')
                                            @slot('data_id')
                                                
                                            @endslot
                                            @slot('title_value')
                                                
                                            @endslot
                                            @slot('summary_value')
                                                
                                            @endslot
                                            @slot('content_value')
                                                
                                            @endslot
                                            @slot('solution_value')
                                                
                                            @endslot
                                        @endcomponent
                                    </div>
                                @endslot
                            @endcomponent
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection