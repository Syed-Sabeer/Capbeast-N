/*
Template Name: Toner eCommerce + Admin HTML Template
Author: Themesbrand
Version: 1.2.0
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: store locator init Js File
*/

// get colors array from the string
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
            console.warn('data-colors Attribute not found on:', chartId);
        }
    }
}
// world map with markers
var vectorMapWorldMarkersColors = getChartColorsArray("world-map-markers");
if (vectorMapWorldMarkersColors)
    var worldemapmarkers = new jsVectorMap({
        map: 'world_merc',
        selector: '#world-map-markers',
        zoomOnScroll: false,
        zoomButtons: false,
        selectedMarkers: [0, 2],
        regionStyle: {
            initial: {
                stroke: "#9599ad",
                strokeWidth: 0.25,
                fill: vectorMapWorldMarkersColors,
                fillOpacity: 1,
            },
        },
        markersSelectable: true,
        markers: [{
            name: "Israel",
            coords: [31.0461, 34.8516]
        },
        {
            name: "Russia",
            coords: [61.5240, 105.3188]
        },
        {
            name: "Germany",
            coords: [51.1657, 10.4515]
        },
        {
            name: "Brazil",
            coords: [-14.2350, -51.9253]
        },
        ],
        markerStyle: {
            initial: {
                fill: "#038edc"
            },
            selected: {
                fill: "red"
            }
        },
        labels: {
            markers: {
                render: function (marker) {
                    return marker.name
                }
            }
        }
    })