@vite(['resources/css/app.css', 'resources/js/app.js'])
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Blog</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-start justify-center pt-16">

<div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
    <form action="" method="POST" class="space-y-4">
        @foreach($posts as $post)
            @if($post['Id']==$id)
        <div>
            <label for="id" class="block text-sm font-medium text-gray-700">ID</label>
            <input type="text" id="id" name="id" value="{{$post['Id']}}"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" value="{{$post['Title']}}"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="3"
                      class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">{{$post['Content']}}</textarea>
        </div>

        <div>
            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
            <input type="text" id="author" name="author" value="{{$post['Author']}}"
                   class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm p-2 border">
        </div>

        <div class="pt-4">
            <a href="{{route('Edited')}}"
               class="w-full bg-indigo-600 hover:bg-indigo-700 text-black font-semibold py-2 px-4 rounded-lg shadow">
                Update
            </a>
        </div>
        <div class="pt-4">
            <a href="{{route('ViewPosts')}}"
               class="w-full bg-indigo-600 hover:bg-indigo-700 text-black font-semibold py-2 px-4 rounded-lg shadow">
                Go Back
            </a>
        </div>
            @endif
        @endforeach
    </form>
</div>

</body>
</html>
