    <!-- this file should be at /views/templates/hook/methodpayments.tpl -->
    <!-- Block methodpayments -->
    <div class="block-contact col-md-3 links wrapper">
        <div class="title clearfix hidden-md-up" data-target="#payment-methods" data-toggle="collapse" aria-expanded="true">
            <span class="h3">{$method_payments_title|escape:'html':'UTF-8'}</span>
            <span class="float-xs-right">
                <span class="navbar-toggler collapse-icons">
                    <i class="material-icons add">keyboard_arrow_down</i>
                    <i class="material-icons remove">keyboard_arrow_up</i>
                </span>
            </span>
        </div>
        <p class="h4 text-uppercase block-contact-title hidden-sm-down">{$method_payments_title|escape:'html':'UTF-8'}</p>
        <div id="payament-methods" class="collapse in" aria-expanded="true">
            <ul>
                {foreach $method_payments_list as $method_payment}
                    <li>{$method_payment}</li>
                {/foreach}
            </ul>
        </div>
    </div>
  <!-- /Block methodpayments -->

  