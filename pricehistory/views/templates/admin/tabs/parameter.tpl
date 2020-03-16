<h3><i class="icon-cogs"></i> {l s='Parameters' mod='pricehistory'}</h3>
<form role="form" action="#" method="POST" id="parameter_form" name="parameter_form">
    <h4>{l s='General parameters' mod='pricehistory'}</h4>

	{* Ajout d'un champs de type text *}
	<div class="form-group">
		<label class="control-label col-lg-3" for="send_address">
		<span class="label-tooltip" data-toggle="tooltip" title="Enter your email adress here">
			{l s='Email adress' mod='pricehistory'}
		</span>
		</label>
		<div class="col-lg-9">
			<div class="input-group">
				<input type="text" name="SEND_ADRESS" id="SEND_ADRESS" {if $send_address}value="{$send_address}"{/if} />
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

    {* Ajoute d'un champs de type : SWITCH *}
    <div class="form-group">
        <label class="control-label col-lg-3" for="SEND_EMAIL">
		<span class="label-tooltip" data-toggle="tooltip"
              title="{l s='Do you want to send an email every time  a price change ?' mod='pricehistory'}">
			{l s='Send email every time price change' mod='pricehistory'}
		</span>
        </label>
        <div class="col-lg-9">
            <div class="col-lg-4">
			<span class="switch prestashop-switch fixed-width-lg">
				<input class="" type="radio" name="SEND_EMAIL" id="SEND_EMAIL_on"
                       value="1" {if $send_email == 1} checked {/if} />
				<label for="SEND_EMAIL_on">
					{l s='Yes' mod='pricehistory'}
				</label>
				<input class="" type="radio" name="SEND_EMAIL" id="SEND_EMAIL_off"
                       value="0" {if $send_email == 0} checked {/if} />
				<label for="SEND_EMAIL_off">
					{l s='No' mod='pricehistory'}
				</label>
				<a class="slide-button btn"></a>
			</span>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>

	<div class="panel-footer">
		<div class="btn-group pull-right">
			<button name="submitParameters" id="submitParameters" type="submit" class="btn btn-default">
				<i class="process-icon-save"></i>
				{l s='Save' mod='pricehistory'}
			</button>
		</div>
	</div>
</form>
