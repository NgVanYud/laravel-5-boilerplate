@extends ('backend.layouts.app')

@section ('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.category.management') }}
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.categories.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{ __('labels.general.num') }}</th>
                                <th>{{ __('labels.backend.access.category.table.title') }}</th>
                                <th>{{ __('labels.backend.access.category.table.post_counter') }}</th>
                                <th>{{ __('labels.general.active') }}</th>
                                <th>{{ __('labels.general.created_at') }}</th>
                                <th>{{ __('labels.general.updated_at') }}</th>
                                <th>{{ __('labels.general.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ ucfirst($category->title) }}</td>
                                    <td>{{ $category->post_counter }}</td>
                                    <td>{!! $category->actived_label !!}</td>
                                    <td>{{ $category->created_at->format('H:i:s d-m-Y') }}</td>
                                    <td>{{ $category->updated_at->format('H:i:s d-m-Y') }}</td>
                                    <td>{!! $category->action_buttons !!}</td>
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
                        {!! $categories->total() !!} {{ trans_choice('labels.backend.access.category.table.total', $categories->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $categories->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endsection
