@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>

                    <div class="card-body">
                        <form method="POST" action="/api/posts/update/{{$post['_id']}}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $post['title'] ?? null }}" required  autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                                <div class="col-md-6">
                                    <input id="category" type="text" class="form-control" name="category" value="{{ $post['category'] ?? null}}" required >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="annotation" class="col-md-4 col-form-label text-md-right">Annotation</label>

                                <div class="col-md-6">
                                    <input id="annotation" type="text" class="form-control" name="annotation" value="{{ $post['annotation'] ?? null}}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>

                                <div class="col-md-6">
{{--                                    <input id="content" type="text" class="form-control" name="content" value="{{ $post['content'] ?? null}}" required>--}}
                                    <textarea id="content" type="text" class="form-control" name="content" required>{{$post['content']}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


