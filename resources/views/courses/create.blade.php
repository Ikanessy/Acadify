<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Add New Course</h2>
                
                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700">Course Title</label>
                        <input type="text" name="title" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Description</label>
                        <textarea name="description" class="w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Price (PHP)</label>
                        <input type="number" name="price" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

<<div class="flex items-center justify-end mt-4">
    <button type="submit" 
            style="background-color: #2563eb; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer; font-weight: bold;">
        SAVE COURSE
    </button>
</div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>