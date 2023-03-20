@extends('layouts.admin.backup_app')

@section('title')
    Concise Admin || Blogs
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            @component('admin.components.breadcrumbs')
                @slot('page_header')
                    Blogs
                @endslot
                @slot('page_desc')
                    {{ $blog->title }}
                @endslot
                @slot('other_links')
                    <li class="breadcrumb-item"><a href="{{ env('ADMIN_URL') }}blogs">Blogs</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $blog->title }}</a></li>
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-12">
                    @component('admin.components.cards')
                        @slot('title')
                            {{ $blog->title }}
                        @endslot
                        @slot('body')
                            <div class="col-lg-6 col-md-9 col-sm-12 mx-auto my-3">
                                <img src="{{ $blog->filename }}" alt="{{ $blog->title }}" style="
                                    width: 600px;
                                    max-width: 90%;
                                    height: auto;
                                    margin: 0 auto;
                                ">
                            </div>
                            <div class="col-lg-9 col-md-12 mx-auto text-justify text-dark">
                                <p>
                                    <strong>Summary: </strong> {{ $blog->summary }}
                                </p>
                                <p>
                                    <strong>Author: </strong>{{ $blog->author }}
                                </p>
                                <p>
                                    <strong>Publication Date: </strong>{{ $blog->publication_date }}
                                </p>
                                <p>{!! html_entity_decode($blog->body) !!}</p>
                                <p>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_blog_modal">Edit</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_blog_modal">Delete</button>

                                    @component('admin.components.long_modal')
                                        @slot('modal_id')
                                            edit_blog_modal
                                        @endslot
                                        @slot('modal_title')
                                            Edit Blog
                                        @endslot
                                        @slot('modal_body')
                                            <div class="col-12 py-3">
                                                @component('admin.components.blog_form')
                                                    @slot('data_id')
                                                        {{ $blog->id }}
                                                    @endslot
                                                    @slot('title_value')
                                                        {{ $blog->title }}
                                                    @endslot
                                                    @slot('author_value')
                                                        {{ $blog->author }}
                                                    @endslot
                                                    @slot('body_value')
                                                        {!! html_entity_decode($blog->body) !!}
                                                    @endslot
                                                    @slot('summary_value')
                                                        {{ $blog->summary }}
                                                    @endslot
                                                    @slot('publication_date')
                                                        {{ date('Y-m-d', strtotime($blog->publication_date)) }}
                                                    @endslot
                                                @endcomponent  
                                            </div>
                                        @endslot
                                    @endcomponent
                                    @component('admin.components.small_modal')
                                        @slot('modal_id')
                                            delete_blog_modal
                                        @endslot
                                        @slot('modal_title')
                                            Delete {{ $blog->title }}
                                        @endslot
                                        @slot('modal_body')
                                            Do you really want to delete {{ $blog->title }} as a Blog from this Website? <br />
                                            Please note that this is not reversible
                                            <p class="text-center">
                                                <button class="btn btn-danger mt-4" data-id="{{ $blog->id }}" id="delete_blog">Delete</button>
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