<script src="{{asset('autocomplete/jquery.auto-complete.js')}}"></script>
<script>
    $(function(){
        $('#find1').autoComplete({
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

        $('#find2').autoComplete({
            minChars: 0,
            source: function(term, suggest){
                term = term.toLowerCase();
                var choices = [];
                <?php
                    foreach( $deposits as $deposit){
                        ?>
                        choices.push('<?php echo $deposit->name ; ?>');
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

    $('#interest').addClass('current');
</script>