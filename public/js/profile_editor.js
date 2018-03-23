// uelmar wizard Jan. 22, 2018
// profile editor

(function($){
	$.fn.profileEditor = function(options){
		var settings = $.extend({}, options);
		var currentSubmitFunction;
		this.current_panel;

		$this = this;

		this.setEvents = function(){
			$this.find('.pr-edit-btn').click(function(){
				var handler = settings.editHandlers[$(this).attr('id')];
				$this.current_panel = $(this).attr('id');
				if(handler){
					handler($this);
				}
				else{
					$this.prepUpdate(this);
				}
			});
			return $this;
		}

		this.prepUpdate = function(elm){
			var targetModal = $(elm).prop('edit-target');
			$(targetModal).modal('show');
			$(targetModal).find('.submit').unbind();
			$(targetModal).find('.submit').click(settings.submitHandlers[$(elm).attr('id')]);
		}

		$this.setEvents();
	}
})(jQuery)

function fillInfos(selector,data){
	$.each(data, function(index, val){
		selector.find('.'+index).html(val);
	});
}