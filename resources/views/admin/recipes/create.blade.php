@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <form method="POST" action="{{ route('admin.recipe.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Recipe Name</label>
            <input type="text" class="form-control" id="name" name="name" >
          </div>

          <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail Link</label>
            <input type="text" class="form-control" id="thumbnail" name="thumbnail" >
          </div>

          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="5" name="description"></textarea>
          </div>

           
          <div class="mb-3 ">
            <select class="form-control js-ingredients" multiple="multiple" name="ingredients[]">
              
            </select>
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="{{ route('admin.recipe.list') }}" type="button" class="btn btn-danger">Cancel</a>
        </form>
      </div>
    </div>
</div>
@endsection

@section('custom-js')
<script type="text/javascript">
  $(document).ready(function() {
      $('.js-ingredients').select2({
        tags: true,
        tokenSeparators: [',', ' ']
      });
  });
</script>
@endsection
