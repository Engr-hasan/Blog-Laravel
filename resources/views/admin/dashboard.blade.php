@extends('layouts.backend.app')
@section('title','Dashboard')
@push('css')

@endpush
@section('content')
   <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Posts</div>
                        <div class="number count-to" data-from="0" data-to="{{$posts->count()}}" data-speed="15" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">favorite</i>
                    </div>
                    <div class="content">
                        <div class="text">Favorite Posts</div>
                        <div class="number count-to" data-from="0" data-to="{{Auth::user()->favorite_posts()->count()}}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-red hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">library_books</i>
                    </div>
                    <div class="content">
                        <div class="text">Pending Posts</div>
                        <div class="number count-to" data-from="0" data-to="{{$total_pending_posts}}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">Total Views</div>
                        <div class="number count-to" data-from="0" data-to="{{$all_views}}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->

       <!-- Widgets -->
       <div class="row clearfix">
           <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="info-box bg-pink hover-zoom-effect">
                   <div class="icon">
                       <i class="material-icons">apps</i>
                   </div>
                   <div class="content">
                       <div class="text">Total Categories</div>
                       <div class="number count-to" data-from="0" data-to="{{$categories_count}}" data-speed="15" data-fresh-interval="20"></div>
                   </div>
               </div>
           </div>
           <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="info-box bg-blue-grey hover-expand-effect">
                   <div class="icon">
                       <i class="material-icons">label</i>
                   </div>
                   <div class="content">
                       <div class="text">Total Tags</div>
                       <div class="number count-to" data-from="0" data-to="{{$tags_count}}" data-speed="1000" data-fresh-interval="20"></div>
                   </div>
               </div>
           </div>
           <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="info-box bg-yellow hover-expand-effect">
                   <div class="icon">
                       <i class="material-icons">account_circle</i>
                   </div>
                   <div class="content">
                       <div class="text">Total Author</div>
                       <div class="number count-to" data-from="0" data-to="{{$author_count}}" data-speed="1000" data-fresh-interval="20"></div>
                   </div>
               </div>
           </div>
           <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <div class="info-box bg-purple hover-expand-effect">
                   <div class="icon">
                       <i class="material-icons">fiber_new</i>
                   </div>
                   <div class="content">
                       <div class="text">Todays Author create</div>
                       <div class="number count-to" data-from="0" data-to="{{$new_authors_today}}" data-speed="1000" data-fresh-interval="20"></div>
                   </div>
               </div>
           </div>
       </div>
       <!-- #END# Widgets -->
       <div class="row clearfix">
           <!-- Task Info -->
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="card">
                   <div class="header">
                       <h2>Most Popular Post</h2>
                       <ul class="header-dropdown m-r--5">
                           <li class="dropdown">
                               <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                   <i class="material-icons">more_vert</i>
                               </a>
                               {{--<ul class="dropdown-menu pull-right">
                                   <li><a href="javascript:void(0);">Action</a></li>
                                   <li><a href="javascript:void(0);">Another action</a></li>
                                   <li><a href="javascript:void(0);">Something else here</a></li>
                               </ul>--}}
                           </li>
                       </ul>
                   </div>
                   <div class="body">
                       <div class="table-responsive">
                           <table class="table table-hover dashboard-task-infos">
                               <thead>
                               <tr>
                                   <th>Rank</th>
                                   <th>Title</th>
                                   <th>Author</th>
                                   <th>Views</th>
                                   <th>Favorite</th>
                                   <th>Comments</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                               </thead>
                               <tbody>
                                    @foreach($popular_posts as $key=>$popular)
                                        <tr>
                                           <td>{{ $key + 1 }}</td>
                                           <td>{{ str_limit($popular->title,'20') }}</td>
                                           <td>{{ $popular->user->name }}</td>
                                           <td>{{$popular->view_count}}</td>
                                           <td>{{$popular->favorite_to_users_count}}</td>
                                           <td>{{$popular->comments_count}}</td>
                                           <td>
                                               @if($popular->status == true)
                                                   <span class="label bg-green">Publish</span>
                                               @else
                                                   <span class="label bg-red">Pending</span>
                                               @endif
                                           </td>
                                            <td>
                                                <a href="{{route('post.details',$popular->slug)}}" target="_blank" class="btn btn-primary waves-effect">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </div>
           <!-- #END# Task Info -->
       </div>

       <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>Top 10 Active Author</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                {{--<ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>--}}
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>Rank List</th>
                                        <th>Name</th>
                                        <th>Posts</th>
                                        <th>Comments</th>
                                        <th>Favorite</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($active_authors as $key => $active_author)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{$active_author->name}}</td>
                                            <td>{{$active_author->posts_count}}</td>
                                            <td>{{$active_author->comments_count}}</td>
                                            <td>{{$active_author->favorite_posts_count}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
        </div>
@endsection
@push('js')
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('assets/brackend/plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('assets/brackend/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{asset('assets/brackend/plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('assets/brackend/plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('assets/brackend/plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('assets/brackend/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{asset('assets/brackend/js/pages/index.js')}}"></script>
@endpush
