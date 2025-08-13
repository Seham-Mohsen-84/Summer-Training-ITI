@vite(['resources/css/app.css', 'resources/js/app.js'])
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Blog</title>
</head>
<body class="bg-gray-100">
<div class="container mx-auto flex justify-center items-start p-6">
    <div class="w-full max-w-lg">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6 text-center">
            <div class="p-6">
                @foreach($posts as $post)
                    @if($post['Id']==$id)
                        <h5 class="text-2xl font-bold text-gray-800 mb-4">
                            {{$post['Title']}} Information!
                        </h5>

                        <p class="text-gray-600 text-left space-y-1">
                            <b>ID: "{{$post['Id']}}"</b> <br>
                            <b>Description: "{{$post['Content']}}"</b> <br>
                            <b>Author: "{{$post['Author']}}"</b> <br>
                        </p>

                        <div class="p-6">
                            <a href="{{route('ViewPosts')}}"
                               class="bg-green-500 text-black px-5 py-2 rounded-lg shadow hover:bg-green-600 transition">
                                Go Back
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
</body>
</html>
