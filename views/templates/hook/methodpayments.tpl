    <!-- this file should be at /views/templates/hook/methodpayments.tpl -->
    <!-- Block methodpayments -->
    <div class="block-contact col-md-3 links wrapper">
        <div class="col-md-8">
            <div class="row">
                <div class="title clearfix hidden-md-up collapsed" id="payment_methods_target" data-target="#payment-methods" data-toggle="collapse" aria-expanded="false">
                    <span class="h3">{$method_payments_title|escape:'html':'UTF-8'}</span>
                    <span class="float-xs-right">
                        <span class="navbar-toggler collapse-icons">
                            <i class="material-icons add">keyboard_arrow_down</i>
                            <i class="material-icons remove">keyboard_arrow_up</i>
                        </span>
                    </span>
                </div>
                <p class="h4 text-uppercase block-contact-title hidden-sm-down">{$method_payments_title|escape:'html':'UTF-8'}</p>
                <div id="payment-methods" class="collapse">
                    <ul>
                        {foreach $method_payments_list as $method_payment => $logo}
                            <li><img target={$test_str} src={$logo} alt="logo" width="35"/> {$method_payment}</li>
                        {/foreach}
                    </ul>
                </div>
            </div>
        </div>
    </div>
  <!-- /Block methodpayments -->

  