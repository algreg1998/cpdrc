$(function () {

    /**
     * Experimental Highcharts plugin to allow download to PNG (through canvg) and SVG
     * using the HTML5 download attribute.
     * 
     * WARNING: This plugin uses the HTML5 download attribute which is not generally 
     * supported. See http://caniuse.com/#feat=download for current uptake.
     *
     * TODO:
     * - Add crossbrowser support by utilizing the Downloadify Flash library?
     * - Option to fall back to online export server on missing support. Display human 
     *   readable error if not.
     */
    (function (Highcharts) {

        // Dummy object so we can reuse our canvas-tools.js without errors
        Highcharts.CanVGRenderer = {};

        /**
         * Downloads a script and executes a callback when done.
         * @param {String} scriptLocation
         * @param {Function} callback
         */
        function getScript(scriptLocation, callback) {
            var head = document.getElementsByTagName('head')[0],
                script = document.createElement('script');

            script.type = 'text/javascript';
            script.src = scriptLocation;
            script.onload = callback;

            head.appendChild(script);
        }

        /**
         * Add a new method to the Chart object to invoice a local download
         */
        Highcharts.Chart.prototype.exportChartLocal = function (options) {

            var chart = this,
                svg = this.getSVG(), // Get the SVG
                canvas,
                a,
                href,
                extension,
                download = function () {

                    var blob;

                    // IE specific
                    if (navigator.msSaveOrOpenBlob) { 

                        // Get PNG blob
                        if (extension === 'png') {
                            blob = canvas.msToBlob();

                        // Get SVG blob
                        } else {
                            blob = new MSBlobBuilder;
                            blob.append(svg);
                            blob = blob.getBlob('image/svg+xml');
                        }

                        navigator.msSaveOrOpenBlob(blob, filename+'.' + extension);

                    // HTML5 download attribute
                    } else {
                        a = document.createElement('a');
                        a.href = href;
                        a.download = filename+'.' + extension;
                        document.body.appendChild(a);
                        a.click();
                        a.remove();
                    }
                },
                prepareCanvas = function () {
                    canvas = document.createElement('canvas'); // Create an empty canvas
                    window.canvg(canvas, svg); // Render the SVG on the canvas

                    href = canvas.toDataURL('image/png');
                    extension = 'png';
                };

            // Add an anchor and apply the download to the button
            if (options && options.type === 'image/svg+xml') {
                href = 'data:' + options.type + ',' + svg;
                extension = 'svg';
                download();

            } else {

                // It's included in the page or preloaded, go ahead
                if (window.canvg) {
                    prepareCanvas();
                    download();

                // We need to load canvg before continuing
                } else {
                    this.showLoading();
                    getScript(Highcharts.getOptions().global.canvasToolsURL, function () {
                        chart.hideLoading();
                        prepareCanvas();
                        download();
                    });
                }
            }
        };


        // Extend the default options to use the local exporter logic
        Highcharts.getOptions().exporting.buttons.contextButton.menuItems = [{
            textKey: 'printChart',
            onclick: function () {
                this.print();
            }
        }, {
            separator: true
        }, {
            textKey: 'downloadPNG',
            onclick: function () {
                this.exportChartLocal();
            }
        }
        // , {
        //     textKey: 'downloadSVG',
        //     onclick: function () {
        //         this.exportChartLocal({
        //             type: 'image/svg+xml'
        //         });
        //     }
        // }
        ];
    }(Highcharts));
	
	$("#populations").highcharts({
	    chart: {
			renderTo: "populations"
		},
		navigation: {
            buttonOptions: {
                enabled: true
            }
        },
        exporting: {
		    buttons: {
		        exportButton: {
		            enabled: true
		        }    
		    }
		},
	    title: {
	        text: 'Inmates population',
	    },
	    subtitle: {
	        text: subTitle,
	    },
	    xAxis: {
	    	title: {
	            text: "Months"
	        },
	        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
	            "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
	    },
	    yAxis: {
	        title: {
	            text: "Inmates"
	        },
	        minRange: 1,
			allowDecimals: false,
	        plotLines: [{
	            value: 0,
	            width: 1,
	            color: "#808080"
	        }]
	    },
	    tooltip: {
            shared: true,
            crosshairs: true,
            valueSuffix: ""
        },
	    series: [{
	        type: "spline",
	        name: "Detainee",
	        data: detainee
	    },{
	        type: "spline",
	        name: "Convict",
	        data: convict
	    },{
	        type: "spline",
	        name: "Probation",
	        data: probation
	    }]
	});
});


// $(function () {

//     /**
//      * Experimental Highcharts plugin to allow download to PNG (through canvg) and SVG
//      * using the HTML5 download attribute.
//      * 
//      * WARNING: This plugin uses the HTML5 download attribute which is not generally 
//      * supported. See http://caniuse.com/#feat=download for current uptake.
//      *
//      * TODO:
//      * - Add crossbrowser support by utilizing the Downloadify Flash library?
//      * - Option to fall back to online export server on missing support. Display human 
//      *   readable error if not.
//      */
//     (function (Highcharts) {

//         // Dummy object so we can reuse our canvas-tools.js without errors
//         Highcharts.CanVGRenderer = {};

//         /**
//          * Downloads a script and executes a callback when done.
//          * @param {String} scriptLocation
//          * @param {Function} callback
//          */
//         function getScript(scriptLocation, callback) {
//             var head = document.getElementsByTagName('head')[0],
//                 script = document.createElement('script');

//             script.type = 'text/javascript';
//             script.src = scriptLocation;
//             script.onload = callback;

//             head.appendChild(script);
//         }

//         /**
//          * Add a new method to the Chart object to invoice a local download
//          */
//         Highcharts.Chart.prototype.exportChartLocal = function (options) {

//             var chart = this,
//                 svg = this.getSVG(), // Get the SVG
//                 canvas,
//                 a,
//                 href,
//                 extension,
//                 download = function () {

//                     var blob;

//                     // IE specific
//                     if (navigator.msSaveOrOpenBlob) { 

//                         // Get PNG blob
//                         if (extension === 'png') {
//                             blob = canvas.msToBlob();

//                         // Get SVG blob
//                         } else {
//                             blob = new MSBlobBuilder;
//                             blob.append(svg);
//                             blob = blob.getBlob('image/svg+xml');
//                         }

//                         navigator.msSaveOrOpenBlob(blob, FILENAME + '.' + extension);

//                     // HTML5 download attribute
//                     } else {
//                         a = document.createElement('a');
//                         a.href = href;
//                         a.download = FILENAME + '.' + extension;
//                         document.body.appendChild(a);
//                         a.click();
//                         a.remove();
//                     }
//                 },
//                 prepareCanvas = function () {
//                     canvas = document.createElement('canvas'); // Create an empty canvas
//                     window.canvg(canvas, svg); // Render the SVG on the canvas

//                     href = canvas.toDataURL('image/png');
//                     extension = 'png';
//                 };

//             // Add an anchor and apply the download to the button
//             if (options && options.type === 'image/svg+xml') {
//                 href = 'data:' + options.type + ',' + svg;
//                 extension = 'svg';
//                 download();

//             } else {

//                 // It's included in the page or preloaded, go ahead
//                 if (window.canvg) {
//                     prepareCanvas();
//                     download();

//                 // We need to load canvg before continuing
//                 } else {
//                     this.showLoading();
//                     getScript(Highcharts.getOptions().global.canvasToolsURL, function () {
//                         chart.hideLoading();
//                         prepareCanvas();
//                         download();
//                     });
//                 }
//             }
//         };


//         // Extend the default options to use the local exporter logic
//         Highcharts.getOptions().exporting.buttons.contextButton.menuItems = [
//         // {
//         //     textKey: 'printChart',
//         //     onclick: function () {
//         //         this.marginTop = 100;
//         //         this.renderer.image(BASE_URL+'assets/images/header.png', 0, 0, 880, 110).add();  

//         //         this.print(); 
//         //     }
//         // },
//         // {
//         //     separator: true
//         // },
//         {
//             textKey: 'downloadPNG',
//             onclick: function () {
//                 this.exportChartLocal();
//             }
//         }
//         // ,{
//         //     textKey: 'downloadSVG',
//         //     onclick: function () {
//         //         this.exportChartLocal({
//         //             type: 'image/svg+xml'
//         //         });
//         //     }
//         // }
//         ];
//     }(Highcharts));


// });