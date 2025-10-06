<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <a class="btn btn-primary" href="{{ route('department.create') }}" role="button">Add Department</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($departments as $department)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $department->name }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('department.edit', $department) }}"
                            role="button">Edit</a>
                        <form action="{{ route('department.destroy', $department) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
</x-app>
