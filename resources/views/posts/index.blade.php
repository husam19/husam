@extends('layout')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6"><h3 class="mb-0">عرض المقالات</h3></div>
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
                <div class="card mb-12">
                    <div class="card-header"><h3 class="card-title">المقالات</h3></div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>العنوان</th>
                                <th>الصورة</th>
                                <th style="width: 40px">عمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;?>
                            @foreach($posts as $post)
                            <tr class="align-middle">
                                <td width="5%">{{$i}}</td>
                                <td width="60%">{{$post->title}}</td>
                                <td width="25%">
                                    @if($post->image)
                                    <img src="{{asset('storage/'.$post->image)}}" style=" width: 20%;">
                                        @endif
                                </td>
                                <td width="10%"><a href="{{route('posts.edit',$post->id)}}"> <i class="bi bi-pen"></i></a>
                                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit">حذف</button>

                                </form>
                                </td>
                            </tr>
                                <?php $i++;?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-end">
                           {{$posts->links()}}
                        </ul>
                    </div>
                </div>

                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

@endsection
