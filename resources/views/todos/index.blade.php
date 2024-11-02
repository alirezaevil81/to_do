@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-center my-3">
                    <h4>تسک ها</h4>
                    <a class="btn btn-sm btn-outline-dark" href="{{ route('todos.create') }}">ایجاد تسک</a>
                </div>
                <div class="card">
                    <div class="card-header">
                        تسک ها
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($todos as $todo)
                                <li class="list-group-item d-flex justify-content-between">
                                    <div class="d-">
                                    {{ $todo->title }}<span class="badge badge-pill p-2 mr-2 badge-success">{{ 'آخرین آپدیت:'. $todo->updated_at->diffForHumans() }}</span>
                                    </div>
                                    <div>
                                        <a class="btn btn-sm btn-dark"
                                            href="{{ route('todos.show', ['todo' => $todo->id]) }}">
                                            نمایش
                                        </a>
                                        {{-- @if (!$todo->completed) --}}
                                        @if ($todo->completed == 0)
                                        <a class="btn btn-sm btn-outline-info"
                                            href="{{ route('todos.complete', ['todo' => $todo->id]) }}">
                                            انجام شد
                                        </a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5">{{ $todos->links() }}</div>
            </div>
        </div>
    </div>
@endsection
