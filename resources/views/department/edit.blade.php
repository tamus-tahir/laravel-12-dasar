<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="{{ route('department.update', $department) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                required value="{{ old('name', $department->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <a href="{{ route('department.index') }}" class="btn btn-warning">Back</a>
        <button type="submit" class="btn btn-primary">Update</button>

    </form>

</x-app>
