$(function () {

			var $cart_data = [];
			  
			  if(localStorage.getItem("cart")){
				$cart_data = JSON.parse(localStorage.getItem("cart"));
			  }
	
			var table = $('#checkout-template');//*[@id="checkout-template"]/text()

			
			var template = Handlebars.compile(table.html());
			var painting = template($cart_data);
			
			$("#output").html(painting);
			
			
			//touchSpin
			
			  $("input[name='quanitySniper']").TouchSpin({
                min: 1,
                max: 100,
                stepinterval: 1,
                maxboostedstep: 10000000,
				buttondown_class: "btn btn-link",
				buttonup_class: "btn btn-link"
            });
			
		
			
});

	function OrderFormController($scope){
	
		$scope.toggleActive = function(s){
			s.active = !s.active;
		};
	
			//update Total
				$scope.carttotal = function(){
					
					var total = formatCurrency(localStorage.getItem("cart_total"));
					return total;
			};
		}