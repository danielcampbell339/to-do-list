<x-layout>
    <div class="row mt-5">
        <div class="col-4">
            <x-form action="{{ route('task.create') }}" method="post">
                <div class="input-group mb-3">
                    <input name="name" type="text" class="form-control" placeholder="Insert task name">
                </div>
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-primary btn-block add-task">Add</button>
                </div>
            </x-form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm">
                        <th scope="col" style="width:5%">#</th>
                        <th scope="col">Task</th>
                        <th scope="col"></th>
                        <tbody>
                            @foreach ($tasks as $key => $task)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class={{ $task->is_done ? 'task_done' : '' }}>
                                        {{ $task->name }}
                                    </td>
                                    <td>
                                        @if (!$task->is_done)
                                            <x-form action="{{ route('task.delete', $task) }}" method="delete">
                                                <button class="btn btn-danger ml-2 btn-sm float-right">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            </x-form>
                                            <x-form action="{{ route('task.done', $task) }}" method="post">
                                                <button class="btn btn-success btn-sm float-right">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            </x-form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>

<style>
    .task_done {
        text-decoration: line-through;
    }

    .add-task {
        background-color: #337AB7;
    }
</style>
