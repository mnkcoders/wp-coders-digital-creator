


document.addEventListener('DOMContentLoaded',function(e){
    
    jQuery('.sender').on('click',function(e){
        if( typeof DashboardScript === 'object' ){
            console.log( 'Sending ' + jQuery(this).val() + ' request ...');
            var data = {
                        'action': 'digital_creator',
                        'route': jQuery(this).val(),
                        'nonce': DashboardScript.nonce,
                    };
            //console.log( DashboardScript.url );
            jQuery.post(
                    DashboardScript.url,
                    data,
                    response => console.log( JSON.parse( response ) )
            );
        }
    });
    
});