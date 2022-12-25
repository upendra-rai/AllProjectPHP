function bar(){
 "use strict";
	 /*----------------------------------------*/
	/*  1.  Bar Chart
	/*----------------------------------------*/

	
	
	/*----------------------------------------*/
	/*  4.  Bar Chart Multi axis
	/*----------------------------------------*/
	var ctx = document.getElementById("barchart4");
    
    var tr_jan = $('input[id=transaction_input01]').val();
    if(tr_jan === undefined){
        tr_jan = 0;
    }
    var tr_feb = $('input[id=transaction_input02]').val();
    if(tr_feb === undefined){
        tr_feb = 0;
    }
    var tr_mar = $('input[id=transaction_input03]').val();
    if(tr_mar === undefined){
        tr_mar = 0;
    }
    var tr_apr = $('input[id=transaction_input04]').val();
    if(tr_apr === undefined){
        tr_apr = 0;
    }
    var tr_may = $('input[id=transaction_input05]').val();
    if(tr_may === undefined){
        tr_may = 0;
    }
    var tr_jun = $('input[id=transaction_input06]').val();
    if(tr_jun === undefined){
        tr_jun = 0;
    }
    var tr_jul = $('input[id=transaction_input07]').val();
    if(tr_jul === undefined){
        tr_jul = 0;
    }
    var tr_aug = $('input[id=transaction_input08]').val();
    if(tr_aug === undefined){
        tr_aug = 0;
    }
    var tr_sep = $('input[id=transaction_input09]').val();
    if(tr_sep === undefined){
        tr_sep = 0;
    }
    var tr_oct = $('input[id=transaction_input10]').val();
    if(tr_oct === undefined){
        tr_oct = 0;
    }
    var tr_nov = $('input[id=transaction_input11]').val();
    if(tr_nov === undefined){
        tr_nov = 0;
    }
    var tr_dec = $('input[id=transaction_input12]').val();
    if(tr_dec === undefined){
        tr_dec = 0;
    }
	var barchart4 = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug","Sep","Oct","Nov","Dec"],
			datasets: [{
                label: 'Sales',
				data: [tr_jan, tr_feb, tr_mar, tr_apr, tr_may, tr_jun, tr_jul,tr_aug,tr_sep,tr_oct,tr_nov,tr_dec],
				borderWidth: 1,
				yAxisID: "y-axis-1",
                backgroundColor: [
                    
					'#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                   
                    
				],
				borderColor: [
					'#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
				],
            }]
		},
		options: {
            
			responsive: true,
            
			title:{
				display:false,
				text:"Bar Chart Multi Axis"
			},
			tooltips: {
				mode: 'index',
				intersect: true
			},
			scales: {
				yAxes: [{
					type: "linear",
					display: true,
					position: "left",
					id: "y-axis-1",
				}, {
					type: "linear",
					display: false,
					position: "right",
					id: "y-axis-2",
					gridLines: {
						drawOnChartArea: false
					}
				}],
			}
		}
	});
	
	
	
	
		
		
};
bar();