jQuery.noConflict();
jQuery(document).ready(function() {
    jQuery('input[type=file]').bootstrapFileInput();
    var progressbar = jQuery( "#progressbar" );
    progressbar.progressbar({value: 0});
    
    function resultToLine(res){
        return res.domain + "," + res.count + "," + (res.mx.join("|") || "NO MX");
    }
    
    var fileInput = document.getElementById('csvfile');
    jQuery(fileInput).change(function() {
        progressbar.show();
        progressbar.progressbar({value: 0});
        jQuery('#res').html("");
        
		var file = fileInput.files[0];
		var reader = new FileReader();
        reader.onload = function(e) {
		    var lines = reader.result.split('\n');
            progressbar.progressbar( "option", "max", lines.length )
            
            var myChain = new Chain();
            jQuery.each(lines, function(index, line){
                line = line.replace("\n","").replace("\r", "");
                var splitedLine = line.split(',');
                var lookupObj = {
                    domain: splitedLine[0],
                    count: splitedLine[1],
                    mx: []
                };
                var callLookup = function(obj){
                    jQuery.post(
                        '/resolve.php',
                        {
                            json: JSON.stringify(obj),
                            delay: (Math.round(Math.random() * 10))
                        }
                    ).done(
                        function(data){
                            var demoValue = jQuery('#res').html();
                            if(demoValue !== "")
                                demoValue += "\n";
                            demoValue += resultToLine(data);
                            jQuery('#res').html(demoValue);
                            var currentValue = progressbar.progressbar( "option", "value");
                            progressbar.progressbar( "option", "value", currentValue + 1);
                        }                     
                    )
                }
                if(lookupObj.domain === "rafaelfpviana.com")
                    lookupObj.mx = ["mx.domain.com","mx2.domain.com"];
                myChain.chain(callLookup.pass(lookupObj));
            });
            
            for(var i=0; i<lines.length; i++){
                myChain.callChain();
            }
        }
        reader.readAsText(file);
    });
});