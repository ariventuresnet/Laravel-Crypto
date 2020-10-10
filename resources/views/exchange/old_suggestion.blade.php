<script src="{{asset('autocomplete/jquery.auto-complete.js')}}"></script>
<script>
    $(function(){
        $('#find1').autoComplete({
            minChars: 0,
            source: function(term, suggest){
                term = term.toLowerCase();
                var choices = ['Bitcoin', 'Litecoin', 'Libra', 'Ethereum', 'EOS', 'Tether'];
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
                var choices = [['Australia', 'au'], ['Austria', 'at'], ['Brasil', 'br'], ['Bulgaria', 'bg'], ['Canada', 'ca'], ['China', 'cn'], ['Czech Republic', 'cz'], ['Denmark', 'dk'], ['Finland', 'fi'], ['France', 'fr'], ['Germany', 'de'], ['Hungary', 'hu'], ['India', 'in'], ['Italy', 'it'], ['Japan', 'ja'], ['Netherlands', 'nl'], ['Norway', 'no'], ['Portugal', 'pt'], ['Romania', 'ro'], ['Russia', 'ru'], ['Spain', 'es'], ['Swiss', 'ch'], ['Turkey', 'tr'], ['USA', 'us']];
                var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~(choices[i][0]+' '+choices[i][1]).toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                suggest(suggestions);
            },
            renderItem: function (item, search){
                search = search.replace(/[-\/\\^$*+?.()|[\]{}]/g, '\\$&');
                var re = new RegExp("(" + search.split(' ').join('|') + ")", "gi");
                return '<div class="autocomplete-suggestion" data-langname="'+item[0]+'" data-lang="'+item[1]+'" data-val="'+search+'"><img src="https://thecryptocutter.com/autocomplete/img/'+item[1]+'.png"> '+item[0].replace(re, "<b>$1</b>")+'</div>';
            },
            onSelect: function(e, term, item){
                console.log('Item "'+item.data('langname')+' ('+item.data('lang')+')" selected by '+(e.type == 'keydown' ? 'pressing enter or tab' : 'mouse click')+'.');
                $('#find2').val(item.data('langname')+' ('+item.data('lang')+')');
            }
        });

        $('#find3').autoComplete({
            minChars: 0,
            source: function(term, suggest){
                term = term.toLowerCase();
                var choices = ['Cash', 'Bank transfer', 'Credit card', 'Debit card', 'Ach tranfer'];
                var suggestions = [];
                for (i=0;i<choices.length;i++)
                    if (~choices[i].toLowerCase().indexOf(term)) suggestions.push(choices[i]);
                suggest(suggestions);
            }
        });

    });
</script>
