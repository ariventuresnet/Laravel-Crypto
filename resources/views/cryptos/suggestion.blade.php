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
                    foreach( $types as $type){
                        ?>
                        choices.push('<?php echo $type->name ; ?>');
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

    $('#dropdownMenuLink').addClass('current');
</script>