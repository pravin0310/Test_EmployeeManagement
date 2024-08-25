<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('admin.employees.create') }}" class="btn btn-primary">Add New Employee +</a>
                    <div class="sucesspop" style="margin-bottom: 10px;">
                        @if (session('success'))
                        <p id="success-message" class="text-center">{{ session('success') }}</p>
                        @endif
                    </div>
                    <div>
                        <table class="table table-success table-striped">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>DOJ</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->employee_id }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->dob }}</td>
                                <td>{{ $employee->doj }}</td>
                                <td>
                                    <div class=" tableAaction" style="display: flex;gap: 10px;">
                                        <a href=" {{ route('admin.employees.edit', $employee->employee_id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.employees.destroy', $employee->employee_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 3000);
        }
    });
</script>