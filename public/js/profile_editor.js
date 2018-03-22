// uelmar wizard Jan. 22, 2018
// profile editor

(function($){
	$.fn.profileEditor = function(options){
		var settings = $.extend({}, options);
		var currentSubmitFunction;

		$this = this;

		this.setAttendance = function(){
			$this.find('.edit-button').click(function(){
				var handler = settings.editHandlers[$(this).prop('eventEdit')];

				if(handler){
					handler();
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
			$(targetModal).find('.submit').click(settings.submitHandlers[$(elm).prop('eventSubmit')]);
		}
	}
})(jQuery)
