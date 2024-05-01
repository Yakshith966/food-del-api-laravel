<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
</head>
<body>
     <!-- addItems.blade.php -->

<form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
     @csrf
 
     <div>
         <label for="name">Name:</label>
         <input type="text" id="name" name="name" required>
     </div>
 
     <div>
         <label for="description">Description:</label>
         <textarea id="description" name="description" required></textarea>
     </div>
 
     <div>
         <label for="price">Price:</label>
         <input type="number" id="price" name="price" step="0.01" required>
     </div>
 
     <div>
         <label for="image">Image:</label>
         <input type="file" id="image" name="image" accept="image/*" required>
     </div>
 
     <div>
         <label for="category_id">Category:</label>
         <select id="category_id" name="category_id" required>
             @foreach($categories as $category)
             <option value="{{ $category->id }}">{{ $category->name }}</option>
             @endforeach
         </select>
     </div>
 
     <button type="submit">Add Item</button>
 </form>
 
     
</body>
</html>