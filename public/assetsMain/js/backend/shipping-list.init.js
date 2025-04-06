/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: shipping-list init File
*/

function getChartColorsArray(chartId) {
    if (document.getElementById(chartId) !== null) {
        var colors = document.getElementById(chartId).getAttribute("data-colors");
        if (colors) {
            colors = JSON.parse(colors);
            return colors.map(function (value) {
                var newValue = value.replace(" ", "");
                if (newValue.indexOf(",") === -1) {
                    var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                    if (color) return color;
                    else return newValue;;
                } else {
                    var val = value.split(',');
                    if (val.length == 2) {
                        var rgbaColor = getComputedStyle(document.documentElement).getPropertyValue(val[0]);
                        rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                        return rgbaColor;
                    } else {
                        return newValue;
                    }
                }
            });
        } else {
            console.warn('data-colors atributes not found on', chartId);
        }
    }
}
// world map with line & markers
var vectorMapWorldLineColors = getChartColorsArray("users-by-country");
if (vectorMapWorldLineColors) {
    var worldlinemap = new jsVectorMap({
        map: "world_merc",
        selector: "#users-by-country",
        zoomOnScroll: false,
        zoomButtons: false,
        markers: [
            {
                name: "Egypt",
                coords: [26.8206, 30.8025]
            },
            {
                name: "United States",
                coords: [37.0902, -95.7129]
            },
        ],
        lines: [{
            from: "United States",
            to: "Egypt"
        },
        ],
        regionStyle: {
            initial: {
                stroke: "#9599ad",
                strokeWidth: 0.25,
                fill: vectorMapWorldLineColors,
                fillOpacity: 1,
            },
        },
        labels: {
            markers: {
                render(marker, index) {
                    return marker.name || marker.labelName || 'Not available'
                }
            }
        },
        lineStyle: {
            animation: true,
            strokeDasharray: "6 3 6",
        },
    })
}