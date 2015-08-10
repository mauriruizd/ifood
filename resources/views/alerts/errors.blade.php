@if(Session::has('message-error'))
<div class="alert alert-danger alert-dismissible" role="alert" xmlns="http://www.w3.org/1999/html">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <strong style="text-align: center;">{{Session::get('message-error')}}</strong>
</div>
@endif