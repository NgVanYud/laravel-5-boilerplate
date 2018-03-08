@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('labels.backend.access.post.management'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.post.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.posts.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('labels.general.num') }}</th>
                                <th>{{ __('labels.backend.access.post.table.title') }}</th>
                                <th>{{ __('labels.backend.access.post.table.cate') }}</th>
                                <th>{{ __('labels.backend.access.post.table.author') }}</th>
                                <th>{{ __('labels.general.active') }}</th>
                                <th>{{ __('labels.general.public') }}</th>
                                <th>{{ __('labels.general.created_at') }}</th>
                                <th>{{ __('labels.general.updated_at') }}</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ ucfirst($post->title) }}</td>
                                    <td>
                                        @foreach($post->categories as $category)
                                            {{$category->title}} <br>
                                        @endforeach
                                    </td>

                                    <td>{{ $post->user->name }}</td>
                                    <td>{!! $post->actived_label !!}</td>
                                    <td>{!! $post->publiced_label !!}</td>
                                    <td>{{ $post->created_at->format('H:i:s d-m-Y') }}</td>
                                    <td>{{ $post->updated_at->format('H:i:s d-m-Y') }}</td>
                                    <td>{!! $post->action_buttons !!}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-7">
                    <div class="float-left">
                        {!! $posts->total() !!} {{ trans_choice('labels.backend.access.post.table.total', $posts->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $posts->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
