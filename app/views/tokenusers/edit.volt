<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("tokenusers", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit tokenusers
    </h1>
</div>

{{ content() }}

{{ form("tokenusers/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldUseremail" class="col-sm-2 control-label">UserEmail</label>
    <div class="col-sm-10">
        {{ text_field("userEmail", "size" : 30, "class" : "form-control", "id" : "fieldUseremail") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAccesstokenkey" class="col-sm-2 control-label">AccessTokenKey</label>
    <div class="col-sm-10">
        {{ text_field("accessTokenKey", "size" : 30, "class" : "form-control", "id" : "fieldAccesstokenkey") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTokentype" class="col-sm-2 control-label">TokenType</label>
    <div class="col-sm-10">
        {{ text_field("tokenType", "size" : 30, "class" : "form-control", "id" : "fieldTokentype") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRefreshtoken" class="col-sm-2 control-label">RefreshToken</label>
    <div class="col-sm-10">
        {{ text_field("refreshToken", "size" : 30, "class" : "form-control", "id" : "fieldRefreshtoken") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAccesstokenexpiresat" class="col-sm-2 control-label">AccessTokenExpiresAt</label>
    <div class="col-sm-10">
        {{ text_field("accessTokenExpiresAt", "type" : "numeric", "class" : "form-control", "id" : "fieldAccesstokenexpiresat") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRefreshtokenexpiresat" class="col-sm-2 control-label">RefreshTokenExpiresAt</label>
    <div class="col-sm-10">
        {{ text_field("refreshTokenExpiresAt", "type" : "numeric", "class" : "form-control", "id" : "fieldRefreshtokenexpiresat") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldAccesstokenvalidationperiod" class="col-sm-2 control-label">AccessTokenValidationPeriod</label>
    <div class="col-sm-10">
        {{ text_field("accessTokenValidationPeriod", "type" : "numeric", "class" : "form-control", "id" : "fieldAccesstokenvalidationperiod") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRefreshtokenvalidationperiod" class="col-sm-2 control-label">RefreshTokenValidationPeriod</label>
    <div class="col-sm-10">
        {{ text_field("refreshTokenValidationPeriod", "type" : "numeric", "class" : "form-control", "id" : "fieldRefreshtokenvalidationperiod") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldClientid" class="col-sm-2 control-label">ClientID</label>
    <div class="col-sm-10">
        {{ text_field("clientID", "size" : 30, "class" : "form-control", "id" : "fieldClientid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldClientsecret" class="col-sm-2 control-label">ClientSecret</label>
    <div class="col-sm-10">
        {{ text_field("clientSecret", "size" : 30, "class" : "form-control", "id" : "fieldClientsecret") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRealmid" class="col-sm-2 control-label">RealmID</label>
    <div class="col-sm-10">
        {{ text_field("realmID", "size" : 30, "class" : "form-control", "id" : "fieldRealmid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstado" class="col-sm-2 control-label">Estado</label>
    <div class="col-sm-10">
        {{ text_field("estado", "size" : 30, "class" : "form-control", "id" : "fieldEstado") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
