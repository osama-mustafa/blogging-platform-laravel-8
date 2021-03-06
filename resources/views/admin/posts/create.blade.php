@extends('home')

@section('content')

    <h2>Create Post</h2>

    @if (session('success_message'))
        <div class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <ul>
                    <li>
                        {{ $error }}
                    </li>
                </ul>
            </div>
        @endforeach
    @endif

    <div class="col-10">

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="post_title">Title</label>
                <input type="text" class="form-control" name="post_title" id="post_title" placeholder="Post Title">
            </div>
            <div class="form-group">
                <label for="post_body">Content</label>
                <textarea class="form-control" name="post_body" id="post_body" rows="3"></textarea>
            </div>

            <h5 class="mt-3">Categories</h5>

            @foreach ($categories as $category)
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                </label class="custom-control-label">{{ $category->category_name }}<label>
            </div>
            @endforeach

            <h5 class="mt-3">Tags</h5>
            
            @foreach ($tags as $tag)
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                    <label>{{ $tag->tag_name }}</label>
                </div>
            @endforeach

            <div class="form-group mt-2">
                <label for="post_image">Image</label><br>
                <input type="file" name="post_image" id="post_image">
            </div>
            <button type="submit" class="btn btn-primary">Publish Post</button>
        </form>

    </div>

    

@endsection

