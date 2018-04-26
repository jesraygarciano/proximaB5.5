// uelmar wizard April 25, 2018
// profile editor

(function($){
	$.fn.unickForm = function(options){
		var settings = $.extend({}, options);
		var currentSubmitFunction;
		this.current_panel;
		this.id;

        $this = this;

        console.log($this);

        $this[0].addEventListener('submit', function(e){
            alert('asd')
            e.preventDefault();

            if(false){
                var ajax = new XMLHttpRequest();
                ajax.open( $this[0].getAttribute( 'method' ), $this[0].getAttribute( 'action' ), true );
                ajax.onload = function()
                {
                    if( ajax.status >= 200 && ajax.status < 400 )
                    {
                        var data = JSON.parse( ajax.responseText );
                        form.classList.add( data.success == true ? 'is-success' : 'is-error' );
                        if( data.success ){
                            console.log(data);
                        }
                    }
                    else alert( 'Error. Please, contact the webmaster!' );
                };

                ajax.onerror = function()
                {
                    alert( 'Error. Please, try again!' );
                };

                ajax.send( ajaxData );
            }
        });

        $this.find('input,select,textarea').change(function(){
            $(this).closest('form-group').removeClass('has-error');
        });

        function validateInputs(){
            $this.find('.form-group').removeClass('has-error');
            var no_error = true;
            $.each(settings.validations,function(k,v){
                var input = $this.find('[name='+k+']');
                switch(v.rules[x].type){
                    case 'empty' : 
                        if(input.val().length == 0){
                            addClassHassError(from_month,'Start month required');                            
                            no_error = false;
                        }
                    break;
                    case 'start_end_date_range' :
                        var elm = $this.find('.'+k);
                        var from_month = elm.find('.from_month');
                        var from_year = elm.find('.from_year');
                        var to_month = elm.find('.to_month');
                        var to_year = elm.find('.to_year');

                        var range_has_error = false;

                        if(from_month.val().length == 0){
                            // 
                            addClassHassError(from_month,'Start month required');
                            no_error = false;
                            range_has_error = true;
                        }
                        if(from_year.val().length == 0){
                            // 
                            addClassHassError(from_year,'Start year required');
                            no_error = false;
                            range_has_error = true;
                        }
                        if(to_month.val().length == 0){
                            // 
                            addClassHassError(to_month,'End month required');
                            no_error = false;
                            range_has_error = true;
                        }
                        if(to_year.val().length == 0){
                            // 
                            addClassHassError(to_year,'End year required');
                            no_error = false;
                            range_has_error = true;
                        }

                        if(!range_has_error){
                            // 
                            if(from_year.val() > to_year.val() || (from_year.val() == to_year.val() && parseInt(from_month.val()) >= parseInt(to_month.val())))
                            {
                                //
                                no_error = false;
                                $(_this).find('.ed_from_month').addClass('has-error');
                                if($(_this).find('.ed_from_month').find('.error-label').length < 1){
                                    $(_this).find('.ed_from_month').append('<label class="error-label">Start Date should be lesser than End Date</label>');
                                }
                                $(_this).find('.ed_from_month').find('.error-label').html('Start Date should be lesser than End Date.');

                                window.scrollTo(0, 0);
                                swal('Please fill in required data', 'Missing data...', 'warning');
                            }
                        }
                    break;
                }
            });
        }

        function addClassHassError(input, append){

            if(append){
                // 
                if($(input).find('.error-label').length < 1){
                    $(input).append('<label class="error-label">Please input the following : </label>');
                }
    
                if($(input).find('.error-label').html().length < 1){
                    $(input).html('Please input the following : ');
                }
    
                $(input).find('.error-label').append('<span class="'+identifier+'">'+prompt+', </span>');
                $(input).addClass('error-border');
                $(input).addClass('has-error');
            }
            else{
                if($(input).closest('.form-group').find('.error-label').length < 1){
                    $(input).closest('.form-group').append('<label class="error-label">Please input the following : </label>');
                }

                $(input).closest('.form-group').find('.error-label').html(prompt);
            }
        }
	}
})(jQuery)