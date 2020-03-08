<div class="col-lg-4 col-md-6">
    <div class="panel panel-default" id="ssd_service_program-widget">
        <div class="panel-heading" data-container="body" title="">
            <h3 class="panel-title"><i class="fa fa-hdd-o"></i>
                <span data-i18n="ssd_service_program.ssd_service_program"></span>
				—&nbsp;<a href="https://support.apple.com/en-gb/13-inch-macbook-pro-solid-state-drive-service" target="_blank" data-i18n="ssd_service_program.ssd_program_url"></a> 
                <list-link data-url="/show/listing/ssd_service_program/ssd_service_program"></list-link>
            </h3>
        </div>
		<div class="panel-body text-center"></div>
    </div><!-- /panel -->
</div><!-- /col -->

<script>
$(document).on('appUpdate', function(e, lang) {

    $.getJSON( appUrl + '/module/ssd_service_program/get_ssd_service_program_stats', function( data ) {
        
    	if(data.error){
    		//alert(data.error);
    		return;
    	}
		
		var panel = $('#ssd_service_program-widget div.panel-body'),
			baseUrl = appUrl + '/show/listing/ssd_service_program/ssd_service_program#';
		panel.empty();

		// Set statuses
        if(data.needs_service){
			panel.append(' <a href="'+baseUrl+'True" class="btn btn-danger"><span class="bigger-150">'+data.needs_service+'</span><br>'+i18n.t('ssd_service_program.needs_service')+'</a>');
		}
        if(data.eligible){
			panel.append(' <a href="'+baseUrl+'Eligible" class="btn btn-info"><span class="bigger-150">'+data.eligible+'</span><br>'+i18n.t('ssd_service_program.eligible')+'</a>');
		}
        if(data.repaired){
			panel.append(' <a href="'+baseUrl+'CXS4LA0Q" class="btn btn-success"><span class="bigger-150">'+data.repaired+'</span><br>'+i18n.t('ssd_service_program.repaired')+'</a>');
		}
    });
});
</script>
