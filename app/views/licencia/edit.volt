<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("licencia", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit licencia
    </h1>
</div>

{{ content() }}

{{ form("licencia/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldRuc" class="col-sm-2 control-label">Ruc</label>
    <div class="col-sm-10">
        {{ text_field("Ruc", "size" : 30, "class" : "form-control", "id" : "fieldRuc") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNumerolicencia" class="col-sm-2 control-label">NumeroLicencia</label>
    <div class="col-sm-10">
        {{ text_field("NumeroLicencia", "size" : 30, "class" : "form-control", "id" : "fieldNumerolicencia") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFechainicio" class="col-sm-2 control-label">FechaInicio</label>
    <div class="col-sm-10">
        {{ text_field("FechaInicio", "type" : "date", "class" : "form-control", "id" : "fieldFechainicio") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFechafin" class="col-sm-2 control-label">FechaFin</label>
    <div class="col-sm-10">
        {{ text_field("FechaFin", "type" : "date", "class" : "form-control", "id" : "fieldFechafin") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstablecimiento" class="col-sm-2 control-label">Establecimiento</label>
    <div class="col-sm-10">
        {{ text_field("Establecimiento", "size" : 30, "class" : "form-control", "id" : "fieldEstablecimiento") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPuntoemision" class="col-sm-2 control-label">PuntoEmision</label>
    <div class="col-sm-10">
        {{ text_field("PuntoEmision", "size" : 30, "class" : "form-control", "id" : "fieldPuntoemision") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUserin" class="col-sm-2 control-label">UserIn</label>
    <div class="col-sm-10">
        {{ text_field("UserIn", "size" : 30, "class" : "form-control", "id" : "fieldUserin") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFechalogin" class="col-sm-2 control-label">FechaLogin</label>
    <div class="col-sm-10">
        {{ text_field("FechaLogin", "type" : "date", "class" : "form-control", "id" : "fieldFechalogin") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldField1" class="col-sm-2 control-label">Field1</label>
    <div class="col-sm-10">
        {{ text_field("Field1", "size" : 30, "class" : "form-control", "id" : "fieldField1") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldField2" class="col-sm-2 control-label">Field2</label>
    <div class="col-sm-10">
        {{ text_field("Field2", "size" : 30, "class" : "form-control", "id" : "fieldField2") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstado" class="col-sm-2 control-label">Estado</label>
    <div class="col-sm-10">
        {{ text_field("Estado", "size" : 30, "class" : "form-control", "id" : "fieldEstado") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
