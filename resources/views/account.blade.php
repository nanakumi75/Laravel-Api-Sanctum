<!DOCTYPE html>
<html lang="en">
<head>
    <x-header-component/>
</head>
<body>
    <x-navigation-component/>
      <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center text-success">User Account Details</h4>
                <table class="table table-striped table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>User Image</th>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Verified At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="{{ $user->image }}" alt="" style="width:100px;border-radius:7px;"></td>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->email_verified_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto my-4 text-center border p-3 rounded">
                <a href="/upload" class="btn btn-lg btn-primary form-control"><i class="bi bi-image"></i> Update Or Upload Profile Photo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 my-3">
                <div class="p-3 border rounded">
                    <a href="{{ URL('/edit/'.$user->id) }}" class="btn btn-lg btn-primary form-control"><i class="bi bi-pencil"></i> Edit Account</a>
                </div>
            </div>
            <div class="col-md-6 my-3">
                <div class="p-3 border rounded">
                    <a href="/delete" class="btn btn-lg btn-danger form-control"><i class="bi bi-trash"></i> Delete Account</a>
                </div>
            </div>
        </div>
      </div>
    <x-footer-component/>
</body>
</html>