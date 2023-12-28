<!-- resources/views/photo_gallery/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Gallery</title>
</head>
<body>
    <h1>Photo Gallery</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('photo_gallery.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Upload Photo</button>
    </form>

    <div style="margin-top: 20px;">
        @foreach ($photos as $photo)
            <img src="{{ asset('uploads/' . $photo->image) }}" alt="Photo">
        @endforeach
    </div>
</body>
</html>
