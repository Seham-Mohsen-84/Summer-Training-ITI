@vite(['resources/css/app.css', 'resources/js/app.js'])
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
<div class="w-full max-w-6xl px-4">
    <table class="w-full text-lg border border-gray-300 bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
        <tr>
            <th class="px-6 py-3 text-left font-bold text-gray-700">ID</th>
            <th class="px-6 py-3 text-left font-bold text-gray-700">Title</th>
            <th class="px-6 py-3 text-left font-bold text-gray-700">Description</th>
            <th class="px-6 py-3 text-left font-bold text-gray-700">Author</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-3 border-t text-gray-600">{{ $post['Id'] }}</td>
                <td class="px-6 py-3 border-t text-gray-600">{{ $post['Title'] }}</td>
                <td class="px-6 py-3 border-t text-gray-600">{{ $post['Content'] }}</td>
                <td class="px-6 py-3 border-t text-gray-600">{{ $post['Author'] }}</td>
                <td colspan="3" class="px-6 py-3 border-t">
                    <a href="{{ route('View', ['id' => $post['Id']]) }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
                        View
                    </a>
                    <a href="{{ route('Edit', ['id' => $post['Id']]) }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
                        Edit
                    </a>
                    <a href="{{ route('Deleted') }}" class="bg-blue-500 text-black px-4 py-2 rounded hover:bg-blue-600">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
</body>
</html>
