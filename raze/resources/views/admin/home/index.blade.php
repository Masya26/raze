@extends('layouts.admin_layout')

@section('title', 'Главная')
@section('content')
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>
                    {{ $notCount }}
                </h3>
                <p>User Registrations</p>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $posts_count }}</h3>

                            <p>Статьи</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('post.index') }}" class="small-box-footer">Все статьи <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $categories_count }}</h3>

                            <p>Категории</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ route('category.index') }}" class="small-box-footer">Все категории <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>LOGIN</th>
                <th>DELETE</th>
                <th>RECIVE</th>
                <th>Дата удаления</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    <td>
                        <form action="{{ route('admin.loginAs', ['loginAvtor' => $user->id]) }}">
                            <button>Login</button>
                        </form>

                    </td>
                    <td>
                        @if ($user->deleted_at)
                        <form action="{{ route('user.revive', ['user' => $user->id]) }}"method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-primary"><i class="bi bi-activity"></i>
                                REVIVE
                            </button>
                        </form>
                        @else
                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST"
                            style="display: inline-block">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                <i class="fas fa-trash">
                                </i>
                                DELETE
                            </button>
                        </form>
                        @endif
                    </td>
                    <td>

                    </td>
                    <td>{{ $user->deleted_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
