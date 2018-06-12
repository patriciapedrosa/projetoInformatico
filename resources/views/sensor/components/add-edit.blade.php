<div class="form-group">
    <b>
        <label for="nome">Nome</label>
    </b>
    <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" value="{{old('nome', $sensor->nome)}}" />
</div>

<div class="form-group">
    <p>
        <b>
            <label for="name">Tipo de Leitura</label>
        </b>
    </p>
    @foreach($sensor_types as $type)
    <input type="radio" @if($sensor->tipo_leitura == $type->type) {{ "checked=\"checked\""}} @endif name="tipo_leitura" value="{{$type->type}}"> {{$type->type}}
    <br> @endforeach
</div>

<div class="form-group">
    <p>
        <b>
            <label for="name">Tipo</label>
        </b>
    </p>
    <input type="radio" @if($sensor->tipo == 'digital') {{ "checked=\"checked\""}} @endif name="tipo" value="digital"> Digital
    <br>
    <input type="radio" @if($sensor->tipo == 'analogico') {{ "checked=\"checked\""}} @endif name="tipo" value="analogico"> Analógico
    <br>



</div>
