<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-900 min-h-screen py-12">

<div class="max-w-xl mx-auto px-6">

    <div class="mb-8">
        <h1 class="text-3xl font-semibold tracking-tight">Edit Student</h1>
        <p class="text-sm text-gray-500 mt-1">Update student information</p>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-6 rounded-md border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-2">Student No</label>
            <input type="text" name="student_no"
                   value="{{ old('student_no', $student->student_no) }}"
                   class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                          focus:border-gray-900 focus:ring-0 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">First Name</label>
            <input type="text" name="first_name"
                   value="{{ old('first_name', $student->first_name) }}"
                   class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                          focus:border-gray-900 focus:ring-0 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">Last Name</label>
            <input type="text" name="last_name"
                   value="{{ old('last_name', $student->last_name) }}"
                   class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                          focus:border-gray-900 focus:ring-0 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">Email</label>
            <input type="email" name="email"
                   value="{{ old('email', $student->email) }}"
                   class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                          focus:border-gray-900 focus:ring-0 focus:outline-none">
        </div>

        <div>
            <label class="block text-sm font-medium mb-2">Course</label>
            <input type="text" name="course"
                   value="{{ old('course', $student->course) }}"
                   class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm
                          focus:border-gray-900 focus:ring-0 focus:outline-none">
        </div>

        <div class="flex justify-between items-center pt-4">

            <a href="{{ route('students.index') }}"
               class="inline-flex items-center gap-2 rounded-md border border-gray-900 px-4 py-2
                      text-sm font-medium text-gray-900 hover:bg-gray-900 hover:text-white transition">

                <!-- back icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 19l-7-7 7-7"/>
                </svg>

                Back
            </a>

            <button type="submit"
                    class="inline-flex items-center gap-2 rounded-md border border-gray-900 px-4 py-2
                           text-sm font-medium text-gray-900 hover:bg-gray-900 hover:text-white transition">

                <!-- save icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M5 13l4 4L19 7"/>
                </svg>

                Update Student
            </button>

        </div>

    </form>

</div>

</body>
</html>