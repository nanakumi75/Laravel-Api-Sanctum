<div class="container my-4">
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center text-primary">Search Students Database</h4>
            <div class="my-5 bg-light rounded p-3">
                <div class="input-group">
                    <input type="search" wire:model.live="search" name="search" id="" class="form-control form-control-lg" placeholder="Search Students Database">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Student Department</th>
                        <th>Student Course</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->department}}</td>
                            <td>{{ $student->course }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md12">
            <p>{{ $students->links() }}</p>
        </div>
    </div>
</div>
