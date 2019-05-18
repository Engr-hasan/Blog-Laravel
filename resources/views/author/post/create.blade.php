@extends('layouts.backend.app')
@section('title','Post')
@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{asset('assets/brackend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endpush
@section('content')
	<div class="container-fluid">
        <form action="{{route('author.post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Add New Post
                            </h2>
                        </div>
                        <div class="body">
                                <label for="title_name">Post Title</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title Name">
                                    </div>
                                </div>

                                <label for="post_image">Feature Image </label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" id="publish" name="status" class="filled-in" value="1">
                                    <label for="publish">Publish</label>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Categories and Tags
                            </h2>
                        </div>
                        <div class="body">
                                <label for="category">Select Category</label>
                                <div class="form-group">
                                    <div class="form-line {{$errors->has('categories') ? 'focused error' : ''}}">
                                        <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <label for="tag">Select Tag</label>
                                <div class="form-group">
                                    <div class="form-line {{$errors->has('tags') ? 'focused error' : ''}}">
                                        <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Post Body
                        </h2>
                    </div>
                    <div class="body">
                        <textarea name="body" id="tinymce"></textarea>

                        <a href="{{route('author.post.index')}}" class="btn btn-danger m-t-15 waves-effect">BACK</a>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
@push('js')
    <!-- Select Plugin Js -->
    <script src="{{asset('assets/brackend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <!-- TinyMCE -->
    <script src="{{asset('assets/brackend/plugins/tinymce/tinymce.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{asset('assets/brackend/plugins/tinymce')}}';
        });
    </script>
@endpush
