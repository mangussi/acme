@if (isset($errors))
  <div class="alert alert-danger" role="alert">
  <ul>
  @foreach ($errors as $key => $value)
      <li>{{ $value }}</li>
  @endforeach
   </ul>
   </div>
   <?php unset($errors) ?>
@endif
