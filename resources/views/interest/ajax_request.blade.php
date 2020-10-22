<script>
    $("#search").click( function(event){
        event.preventDefault();
        
        let deposit = $("input[name=deposit]").val();
        let country = $("input[name=country]").val();
        let _token =  $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url : "getinterests",
            type: "POST",
            data: {
                "deposit" : deposit,
                "country" : country,
                "_token"  : _token
            },
            success: function(response){
                // console.log(response.interests);
                let interests = response.interests;
                $("tbody").html("");
                $(".separator").html("Search Result");
                for(let count=0 ; count < interests.length ; count++){
                    let interest = interests[count];
                    console.log(interest);
                    let name = interest["name"];
                    let slug_name = name.replace(" ", "_");
                    let logo = interest["logo"];
                    let btc_only = interest["btc_only"];
                    let term = interest["term"];
                    let crypto_interest = interest["interest"];
                    let ease = interest["ease"];
                    let privacy = interest["privacy"];
                    let speed = interest["speed"];
                    let fee = interest["fee"];
                    let reputation = interest["reputation"];
                    let limit = interest["limit"];

                    let image = '{{asset("images/") . "/" . ":logo"}}';
                    image = image.replace(':logo', logo);
                    let path = '{{route("cryptointerest.show", ":slug")}}';
                    path = path.replace(':slug', slug_name);
                    $('tbody').append('<tr class="table-row"><td class="td-name"><a href="'+path+'" class="text-dark text-nowrap"> <img src="'+image+'" class="rounded-circle" width="15%" alt="Exchange Logo"> '+name+' </a></td> <td>'+btc_only+'</td> <td>'+term+'</td> <td>'+crypto_interest+'</td> <td>'+ease+'</td> <td>'+privacy+'</td> <td>'+speed+'</td> <td>'+fee+'</td> <td>'+reputation+'</td> <td>'+limit+'</td>');
                }
            },
        });
    });
</script>