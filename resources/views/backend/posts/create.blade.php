@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.post.management') . ' | ' . __('labels.backend.access.post.create'))
@section('content')
    <form action="{{route('backend.post.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{csrf_field()}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.post.management') }}
                        <small class="text-muted">{{ __('labels.backend.access.post.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="">{{__('validation.attributes.backend.access.posts.title')}}</label>

                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="{{__('validation.attributes.backend.access.posts.title')}}" required name="title">
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2" for="">{{__('validation.attributes.backend.access.posts.category')}}</label>

                        <div class="col-md-10">
                            <select name="category[]" id="" class="form-control" multiple>
                                    <option value="0">{{__('validation.attributes.backend.access.posts.select_cate')}}</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2" for="">{{__('validation.attributes.backend.access.posts.summary')}}</label>

                        <div class="col-md-10">
                            <textarea name="summary" class="form-control post-content">{{ Request::old('summary') }}</textarea>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        <label class="col-md-2" for="">{{__('validation.attributes.backend.access.posts.avatar')}}</label>

                        <div class="col-md-10">
                            <input type="file" name="avatar" class="form-control" required>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('backend.post.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    </form>
@endsection
@section('after-script-end')
    <script>
        $(document).ready(function() {
            $('.post-content').summernote();
        });
    </script>
@endsection
