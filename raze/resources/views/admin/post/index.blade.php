@extends('layouts.admin_layout')

@section('title', 'Все статьи')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Все статьи</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 5%">
                                    ID
                                </th>
                                <th style="width: 5%">
                                    Имя пользователя
                                </th>

                                <th>
                                    Название
                                </th>
                                <th>
                                    Текст
                                </th>
                                <th>
                                    Дата добавления
                                </th>
                                <th>
                                    Дата удаления
                                </th>
                                <th style="width: 30%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post['id'] }}
                                    </td>
                                    <td>
                                        {{ $post->user->name }}
                                    </td>

                                    <td>
                                        {{ $post['name'] }}
                                    </td>
                                    <td>
                                        {{ $post['title'] }}
                                    </td>
                                    <td>
                                        {{ $post['created_at'] }}
                                    </td>
                                    <td>
                                        {{ $post['deleted_at'] }}
                                    </td>
                                        @if ($post->deleted_at)

                                        <td>
                        
                                            <form action="{{ route('post.revive', $post['id']) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('PUT') }}
                                                <button type="submit" class="btn btn-primary"><i class="bi bi-activity"></i>
                                                    REVIVE
                                                </button>
                                            </form>
                                        </td>
                                        @else
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm" href="{{ route('post.edit', $post['id']) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Редактировать
                                            </a>

                                        </td>
                                        <td>
                                            <form action="{{ route('post.destroy', $post['id']) }}" method="POST"
                                                style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Удалить
                                                </button>
                                            </form>
                                        </td>
                                        @endif
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
