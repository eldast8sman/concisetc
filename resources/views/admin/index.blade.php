@extends('layouts.admin.app')

@section('title')
    Concise Admin
@endsection

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @component('admin.components.cards')
                            @slot('title')
                                Team Members
                            @endslot
                            @slot('body')
                                <p class="py-3">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#add_team_modal">Add Team Member</button>
                                </p>
                                <div class="row">
                                    @foreach ($teams as $team)
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            @component('admin.components.cards')
                                                @slot('title')
                                                    
                                                @endslot
                                                @slot('body')
                                                    <div style="
                                                        height: 300px;
                                                        background-image: url({{ $team->filename }});
                                                        background-size: contain;
                                                        background-position: center center;
                                                        background-repeat: no-repeat;
                                                    ">
                                                        <img src="{{ $team->filename }}" alt="{{ $team->name }}" height="300px" style="opacity: 0">
                                                    </div>
                                                    <p class="col-12">
                                                        <table>
                                                            <tr>
                                                                <td><strong>Name: </strong></td><td>{{ $team->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Position: </strong></td><td>{{ $team->position }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Bio</strong></td><td>{{ $team->bio }}</td>
                                                            </tr>
                                                        </table>
                                                    </p>
                                                    <p class="col-12">
                                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#edit_team_modal_{{ $team->id }}">Edit Team</button>
                                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#delete_team_modal_{{ $team->id }}">Delete</button>
                                                    </p>
                                                    @component('admin.components.long_modal')
                                                        @slot('modal_id')
                                                            edit_team_modal_{{ $team->id }}
                                                        @endslot
                                                        @slot('modal_title')
                                                            Edit Team
                                                        @endslot
                                                        @slot('modal_body')
                                                            <div class="col-12 py-3">
                                                                @component('admin.components.team_form')
                                                                    @slot('data_id')
                                                                        {{ $team->id }}
                                                                    @endslot
                                                                    @slot('name_value')
                                                                        {{ $team->name }}
                                                                    @endslot
                                                                    @slot('position_value')
                                                                        {{ $team->position }}
                                                                    @endslot
                                                                    @slot('bio_value')
                                                                        {{ $team->bio }}
                                                                    @endslot
                                                                @endcomponent
                                                            </div>
                                                        @endslot
                                                    @endcomponent

                                                    @component('admin.components.small_modal')
                                                        @slot('modal_id')
                                                            delete_team_modal_{{ $team->id }}
                                                        @endslot
                                                        @slot('modal_title')
                                                            Delete {{ $team->position }}
                                                        @endslot
                                                        @slot('modal_body')
                                                            Do you really want to delete {{ $team->name }} as the {{ $team->position }} of Concise?
                                                            Please note that this is not reversible
                                                            <p class="text-center">
                                                                <button class="btn btn-danger mt-4 delete_team" data-id="{{ $team->id }}">Delete</button>
                                                            </p>
                                                        @endslot
                                                    @endcomponent
                                                @endslot
                                            @endcomponent
                                        </div>
                                    @endforeach
                                </div>
                                @component('admin.components.long_modal')
                                    @slot('modal_id')
                                        add_team_modal
                                    @endslot
                                    @slot('modal_title')
                                        Add Team
                                    @endslot
                                    @slot('modal_body')
                                        <div class="col-12 py-3">
                                            @component('admin.components.team_form')
                                                @slot('data_id')
                                                    
                                                @endslot
                                                @slot('name_value')
                                                    
                                                @endslot
                                                @slot('position_value')
                                                    
                                                @endslot
                                                @slot('bio_value')
                                                    
                                                @endslot
                                            @endcomponent
                                        </div>
                                    @endslot
                                @endcomponent
                            @endslot
                        @endcomponent
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @component('admin.components.cards')
                            @slot('title')
                                Tetimonials
                            @endslot
                            @slot('body')
                                <p class="py-3">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#add_testimonial_modal">Add Testimonial</button>
                                </p>
                                <div class="row">
                                    @foreach ($testimonials as $testimonial)
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        @component('admin.components.cards')
                                            @slot('title')
                                                
                                            @endslot
                                            @slot('body')
                                                <p class="col-12">
                                                    {{ $testimonial->testimonial }}
                                                </p>
                                                <p class="col-12">
                                                    <img src="{{ $testimonial->filename }}" alt="{{ $testimonial->name }}" height="100px" width="author">
                                                    <br>
                                                    <span><strong>{{ $testimonial->name }}</strong></span> - <span>{{ $testimonial->position }}</span>
                                                </p>
                                                <p class="col-12">
                                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#edit_testimonial_modal_{{ $testimonial->id }}">Edit</button>
                                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#delete_testimonial_modal_{{ $testimonial->id }}">Delete</button>
                                                </p>
                                                @component('admin.components.long_modal')
                                                    @slot('modal_id')
                                                        edit_testimonial_modal_{{ $testimonial->id }}
                                                    @endslot
                                                    @slot('modal_title')
                                                        Edit Testimonial
                                                    @endslot
                                                    @slot('modal_body')
                                                        <div class="col-12 py-3">
                                                            @component('admin.components.testimonial_form')
                                                                @slot('data_id')
                                                                    {{ $testimonial->id }}
                                                                @endslot
                                                                @slot('name_value')
                                                                    {{ $testimonial->name }}
                                                                @endslot
                                                                @slot('position_value')
                                                                    {{ $testimonial->position }}
                                                                @endslot
                                                                @slot('testimonial_value')
                                                                    {{ $testimonial->testimonial }}
                                                                @endslot
                                                            @endcomponent
                                                        </div>
                                                    @endslot
                                                @endcomponent

                                                @component('admin.components.small_modal')
                                                @slot('modal_id')
                                                    delete_testimonial_modal_{{ $testimonial->id }}
                                                @endslot
                                                @slot('modal_title')
                                                    Delete Testimonial
                                                @endslot
                                                @slot('modal_body')
                                                    Do you really want to delete this Testimonial from this App? <br />
                                                    Please note that this is not reversible
                                                    <p class="text-center">
                                                        <button class="btn btn-danger mt-4 delete_testimonial" data-id="{{ $testimonial->id }}">Delete</button>
                                                    </p>
                                                @endslot
                                                @endcomponent
                                            @endslot
                                        @endcomponent
                                    </div>
                                    @endforeach
                                </div>

                                @component('admin.components.long_modal')
                                    @slot('modal_id')
                                        add_testimonial_modal
                                    @endslot
                                    @slot('modal_title')
                                        Add Testimonial
                                    @endslot
                                    @slot('modal_body')
                                        <div class="col-12 py-3">
                                            @component('admin.components.testimonial_form')
                                                @slot('data_id')
                                                    
                                                @endslot
                                                @slot('name_value')
                                                    
                                                @endslot
                                                @slot('position_value')
                                                    
                                                @endslot
                                                @slot('testimonial_value')
                                                    
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
        <!--**********************************
            Content body end
        ***********************************-->
@endsection