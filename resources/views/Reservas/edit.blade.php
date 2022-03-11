<form action="{{url('/Reservas/'.$reserva->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('reservas.form',['modo'=>'editar']);

    </form>
