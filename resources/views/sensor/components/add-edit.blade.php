<div class="form-group">
    <b>
        <label for="nome">Nome</label>
    </b>
    <input type="text" class="form-control" name="nome" id="nome" placeholder="nome" value="{{old('nome', $sensor->nome)}}" />
</div>

<div class="form-group">
    <b>
    <label for="name" class="col-md-4 control-label">Tipo</label>
    </b>
        <p><input type="radio" name="tipo" value="1" checked=""> Analogico</p>
        <p><input type="radio" name="tipo" value="0"> Digital</p>
</div>

<div class="form-group">
    <b>
        <label for="nome">Grandeza</label>
    </b>
    <input type="text" class="form-control" name="grandeza" id="grandeza" placeholder="grandeza" value="{{old('grandeza', $sensor->grandeza)}}" />
</div>

<div class="form-group">
    <b>
    <label for="name" class="col-md-4 control-label">Pin</label>
    </b>
    <p><input type="radio" name="pin" value="A0" checked=""> A0 </p>
       <p> <input type="radio" name="pin" value="D1"> D1 </p>
        <p><input type="radio" name="pin" value="D2" > D2
        
         </p>
</div>

<div class="form-group">
    <b>
    <label for="name" class="col-md-4 control-label">Ativo</label>
    </b>
        <p><input type="radio" name="ativo" value="1" checked=""> Sim</p>
        <p><input type="radio" name="ativo" value="0"> Não</p>
</div>



