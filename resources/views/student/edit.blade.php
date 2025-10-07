<x-app>

    <x-slot:title>{{ $title }}</x-slot:title>

    <form action="{{ route('student.update', $student) }}" method="post">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                required value="{{ old('name', $student->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim"
                required value="{{ old('nim', $student->nim) }}">
            @error('nim')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="department_id" class="form-label">Department</label>
            <select class="form-select @error('department_id') is-invalid @enderror" id="department_id"
                name="department_id" required>
                <option value="">Choose Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" @selected(old('department_id', $student->department_id) == $department->id)>{{ $department->name }}</option>
                @endforeach
            </select>
            @error('department_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <a href="{{ route('student.index') }}" class="btn btn-warning">Back</a>
        <button type="submit" class="btn btn-primary">Save</button>

    </form>

</x-app>
