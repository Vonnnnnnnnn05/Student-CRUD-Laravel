<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900 min-h-screen py-12">
<div class="max-w-5xl mx-auto px-6">

    <div class="flex items-end justify-between mb-6">
        <div>
            <h1 class="text-3xl font-semibold tracking-tight">Student Records</h1>
            <p class="text-sm text-gray-500 mt-1">Manage student information</p>
        </div>

        <a href="{{ route('students.create') }}"
           class="inline-flex items-center gap-2 rounded-md border border-gray-900 px-3 py-2 text-sm font-medium
                  text-gray-900 hover:bg-gray-900 hover:text-white transition">
            <!-- plus icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Add Student
        </a>
    </div>

    @if(session('success'))
        <div class="mb-5 rounded-md border border-gray-200 bg-gray-50 px-4 py-3 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left font-medium">First Name</th>
                    <th class="px-4 py-3 text-left font-medium">Last Name</th>
                    <th class="px-4 py-3 text-left font-medium">Email</th>
                    <th class="px-4 py-3 text-left font-medium">Course</th>
                    <th class="px-4 py-3 text-left font-medium w-44">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse ($students as $student)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">{{ $student->first_name }}</td>
                        <td class="px-4 py-3">{{ $student->last_name }}</td>
                        <td class="px-4 py-3">{{ $student->email }}</td>
                        <td class="px-4 py-3">{{ $student->course }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-2">

                                <!-- Outline-dark Edit -->
                                <a href="{{ route('students.edit', $student->id) }}"
                                   class="inline-flex items-center gap-2 rounded-md border border-gray-900 px-3 py-1.5
                                          text-xs font-medium text-gray-900 hover:bg-gray-900 hover:text-white transition">
                                    <!-- pencil icon -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19.5 7.125L16.875 4.5"/>
                                    </svg>
                                    Edit
                                </a>

                                <!-- Outline-dark Delete (red on hover only) -->
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this student?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center gap-2 rounded-md border border-gray-900 px-3 py-1.5
                                                   text-xs font-medium text-gray-900 hover:border-red-600 hover:bg-red-600 hover:text-white transition">
                                        <!-- trash icon -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m-6 0V5a2 2 0 012-2h2a2 2 0 012 2v2"/>
                                        </svg>
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-10 text-center text-gray-500">
                            No students found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
</body>
</html>