@extends('layout')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">@if(isset($post))تعديل مقال @else اضافة مقال@endif</h3></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Layout RTL</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Title</h3>
                                <div class="card-tools">
                                    <button
                                        type="button"
                                        class="btn btn-tool"
                                        data-lte-toggle="card-collapse"
                                        title="Collapse"
                                    >
                                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-tool"
                                        data-lte-toggle="card-remove"
                                        title="Remove"
                                    >
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                    <!--begin::Quick Example-->
                                    <div class="card card-primary card-outline mb-4">
                                        <!--begin::Header-->
                                        <div class="card-header"><div class="card-title">@if(isset($post))تعديل مقال @else اضافة مقال@endif </div></div>
                                        <!--end::Header-->
                                        <!--begin::Form-->
                                        @if(isset($post))
                                        <form action="{{route('posts.update',$post->id)}}" method="post" enctype="multipart/form-data">
                                           @method('PUT')
                                            @else
                                                <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">

                                                @endif
                                            @csrf
                                            <!--begin::Body-->
                                            <div class="card-body">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">العنوان</label>
                                                    <input
                                                        type="text"
                                                        name="title"
                                                        class="form-control"
                                                        id="exampleInputEmail1"
                                                        value="{{old('title',isset($post)?$post->title:null)}}"
                                                        aria-describedby="emailHelp"
                                                    />
                                                    <div id="emailHelp" class="form-text">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">التفاصيل</label>
                                                    <textarea name="details" class="form-control" id="exampleInputPassword1" cols="60" rows="6" >
                                                        {{old('details',isset($post)?$post->details:null)}}
                                                    </textarea>
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input type="file" name="image" class="form-control" id="inputGroupFile02" />
                                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                                </div>

                                            </div>
                                            <!--end::Body-->
                                            <!--begin::Footer-->
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            <!--end::Footer-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Quick Example-->

                                    <!--end::Horizontal Form-->

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">Footer</div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

@endsection
