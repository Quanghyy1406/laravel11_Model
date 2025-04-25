@extends('dashboard')

@section('content')
<style>
    .pagination {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin-top: 20px;
    }

    .pagination .page-item {
        margin: 0 5px;
    }

    .pagination .page-item.disabled .page-link,
    .pagination .page-item.active .page-link {
        background-color: #007bff; /* Màu nền cho trang hiện tại */
        color: #fff;
        border-color: #007bff;
    }

    .pagination .page-item .page-link {
        border: 1px solid #ccc;
        color: #333;
        padding: 0.4rem 0.8rem;
        text-decoration: none;
        border-radius: 5px;
        font-size: 0.9rem;
        line-height: 1.2;
    }

    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        /* Ẩn hoặc tùy chỉnh nút Previous/Next */
        text-indent: -9999px; /* Ẩn text (dấu '<' và '>') */
        overflow: hidden;
        width: 30px; /* Điều chỉnh kích thước nút nếu cần */
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1rem; /* Kích thước biểu tượng nếu bạn muốn thêm */
        /* Nội dung CSS để hiển thị mũi tên (Unicode hoặc Font Awesome) */
    }

    .pagination .page-item:last-child .page-link::after {
        content: '\00BB'; /* Unicode cho mũi tên sang phải » */
    }

    .pagination .page-item.disabled:first-child .page-link::before,
    .pagination .page-item.disabled:last-child .page-link::after {
        color: #ccc; /* Màu xám cho nút disabled */
    }
</style>
<main class="d-flex justify-content-center align-items-center min-vh-100 py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">User List</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Roles</th>
                                        <th class="text-center">Orders</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $user->name }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center">{{ $user->roles }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-secondary">View Orders</button>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('user.readUser', ['id' => $user->id]) }}" class="btn btn-sm btn-info">View</a>
                                                <a href="{{ route('user.updateUser', ['id' => $user->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No users found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center my-3">
                            {{ $users->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection