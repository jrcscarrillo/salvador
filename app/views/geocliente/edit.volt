<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("geocliente", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit geocliente
    </h1>
</div>

{{ content() }}

{{ form("geocliente/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldCustomerreflistid" class="col-sm-2 control-label">CustomerRefListID</label>
    <div class="col-sm-10">
        {{ text_field("CustomerRefListID", "size" : 30, "class" : "form-control", "id" : "fieldCustomerreflistid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomerreffullname" class="col-sm-2 control-label">CustomerRefFullName</label>
    <div class="col-sm-10">
        {{ text_field("CustomerRefFullName", "size" : 30, "class" : "form-control", "id" : "fieldCustomerreffullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalesrepreflistid" class="col-sm-2 control-label">SalesRepRefListID</label>
    <div class="col-sm-10">
        {{ text_field("SalesRepRefListID", "size" : 30, "class" : "form-control", "id" : "fieldSalesrepreflistid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalesrepreffullname" class="col-sm-2 control-label">SalesRepRefFullName</label>
    <div class="col-sm-10">
        {{ text_field("SalesRepRefFullName", "size" : 30, "class" : "form-control", "id" : "fieldSalesrepreffullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomermoreinfo" class="col-sm-2 control-label">CustomerMoreInfo</label>
    <div class="col-sm-10">
        {{ text_field("CustomerMoreInfo", "size" : 30, "class" : "form-control", "id" : "fieldCustomermoreinfo") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldLatitude" class="col-sm-2 control-label">Latitude</label>
    <div class="col-sm-10">
        {{ text_field("Latitude", "size" : 30, "class" : "form-control", "id" : "fieldLatitude") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldLongitude" class="col-sm-2 control-label">Longitude</label>
    <div class="col-sm-10">
        {{ text_field("Longitude", "size" : 30, "class" : "form-control", "id" : "fieldLongitude") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAddress" class="col-sm-2 control-label">Address</label>
    <div class="col-sm-10">
        {{ text_field("Address", "size" : 30, "class" : "form-control", "id" : "fieldAddress") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFeatured" class="col-sm-2 control-label">Featured</label>
    <div class="col-sm-10">
        {{ text_field("Featured", "type" : "numeric", "class" : "form-control", "id" : "fieldFeatured") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
