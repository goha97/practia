
<div class="container">
<form action="{{url('/Reservas')}}"  method="post" enctype="text/plain">
    @csrf
   @include('reservas.form',['modo'=>'crear'])

</form>

</div>

