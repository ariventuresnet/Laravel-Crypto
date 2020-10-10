<script src="{{asset('autocomplete/jquery.auto-complete.js')}}"></script>
<script>
    $(function(){
        $('#find1').autoComplete({
            minChars: 0,
            source: function(term, suggest){
                term = term.toLowerCase();
                var choices = [];
                <?php
                    foreach( $currencies as $currency){
                        ?>
                        choices.push('<?php echo $currency->name ; ?>');
                        <?php
                    }
                ?>
                var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                suggest(suggestions);
            }
        });

        $('#find2').autoComplete({
            minChars: 0,
            source: function(term, suggest){
                term = term.toLowerCase();
                var choices = [];
                <?php
                    foreach( $countries as $country){
                        ?>
                        choices.push('<?php echo $country->name ; ?>');
                        <?php
                    }
                ?>
                var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                suggest(suggestions);
            }
        });

        $('#find3').autoComplete({
            minChars: 0,
            source: function(term, suggest){
                term = term.toLowerCase();
                var choices = [];
                <?php
                    foreach( $collaterals as $collateral){
                        ?>
                        choices.push('<?php echo $collateral->name; ?>');
                        <?php
                    }
                ?>
                var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                suggest(suggestions);
            }
        });

    });

    $('#loan').addClass('current');
</script>