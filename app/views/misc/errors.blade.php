@if ($errors->any())
<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
  </ul>
</div>
@endif