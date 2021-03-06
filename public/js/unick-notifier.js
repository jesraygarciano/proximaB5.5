// uelmar wizard April 25, 2018
// profile editor

(function($){
	$.fn.unickNotifier = function(options, addItemFunc, updateItemFunc, clearFunc){
        var settings = $.extend({}, options);
		var $this = this;
		
		fetchNotification();
        
        function fetchNotification(){
            $.ajax({
                url:settings.fetch_url,
                type:"GET",
                data:{},
                success:function(data){
                    clearFunc();
                    for(x in data.notifications){
                        addItemFunc(data.notifications[x]);
                    }
                },
                error:function(){}
            });
        }

        $.socket.on('connect',function(){
			//
		});

		$.socket.on('disconnect', function () {
			//
		});

		$.socket.on('reconnect', function () {
			// if (username) {
			//   socket.emit('add user', username);
			// }
        });
        
        $.socket.on('notification-channel:App\\Events\\NotificationEvent',function(data){
			//
			console.log(data);
			if(data.data.event == 'created')
			{
				// switch(data.data.type){
				// 	case 'new opening':
				// 	$this.find('.new_openings').html(new_openings).show();
                // }
				clearFunc();
				addItemFunc(data.data.notification);
			}
			else
			{
				// switch(data.data.type){
				// 	case 'new opening':
				// 	$this.find('.new_openings').html(new_openings).css({display:( new_openings < 1 ?'none':'')});
				// 	break;
                // }
                updateItemFunc(data.data.notification);
			}

		});

		$.socket.on('reconnect_error', function () {
			//
		});
	}
})(jQuery)