var graph;
var xPadding = 30;
var yPadding = 30;
var barWidth = 10;
var barSpace = 5;
var maxY = 0;
var scale = 1;
var colors = ["#1b9e77", "#d95f02"];

var data = [[
        { X: "Jan", Y: 110 },
        { X: "Fev", Y: 116 },
        { X: "Mar", Y: 105 },
        { X: "Avr", Y: 92 },
        { X: "Mai", Y: 79 },
        { X: "Juin", Y: 78.5 },
        { X: "Juil", Y: 0 },
        { X: "Aout", Y: 0 },
        { X: "Sept", Y: 0 },
        { X: "Oct", Y: 0 },
        { X: "Nov", Y: 0 },
        { X: "Dec", Y: 0 }
    ],
    [
        { X: "Jan", Y: 114 },
        { X: "Fev", Y: 113.5 },
        { X: "Mar", Y: 109.5 },
        { X: "Avr", Y: 95.5 },
        { X: "Mai", Y: 76 },
        { X: "Juin", Y: 75 },
        { X: "Juil", Y: 0 },
        { X: "Aout", Y: 0 },
        { X: "Sept", Y: 0 },
        { X: "Oct", Y: 0 },
        { X: "Nov", Y: 0 },
        { X: "Dec", Y: 0 }
    ]
];

function getMaxY(values) {
    var max = 0;
    
    for (var i = 0; i < values.length; ++i) {
        for (var j = 0; j < values[i].length; ++j) {
            if (values[i][j].Y > max)
                max = values[i][j].Y;
        }
    }

    //Round up value for scaling
    max += 5 - (max % 5);

    return max;
}

function getScale() {
    var temp = maxY;
    var temp_scale = 1;

    while (temp >= 10) {
        temp_scale *= 10;
        temp /= 10;
    }

    //Do not scale too high if max value just above scale
    if (maxY / temp_scale < 3)
        temp_scale /= 10;

    return temp_scale;
}

function getXPixel(value, values) {
    return ((graph.width - xPadding) / values.length) * value + (xPadding * 1.5);
}

function getYPixel(value) {
    return graph.height - (((graph.height - yPadding) / maxY) * value) - yPadding;
}

//Draw graph associated to values
//Values must be bidimensional array, with max 2 sets of values
function drawGraph(graph, values) {
    var c = graph.getContext('2d');
    
    maxY = getMaxY(values);
    scale = getScale();

    c.lineWidth = 2;
    c.strokeStyle = '#333';
    c.font = 'italic 8pt sans-serif';
    c.textAlign = "center";

    c.beginPath();
    c.moveTo(xPadding, 0);
    c.lineTo(xPadding, graph.height - yPadding);
    c.lineTo(graph.width, graph.height - yPadding);
    c.stroke();

    for (var i = 0; i < values[0].length; ++i) {
        c.fillText(values[0][i].X, getXPixel(i, values[0]), graph.height - yPadding + 20);
    }

    c.textAlign = "right";
    c.textBaseline = "middle";

    for (var i = 0; i < maxY; i += scale) {
        c.fillText(i, xPadding - 10, getYPixel(i));
    }   
    
    var offset = 0;
    if (values.length == 2)
        offset = (barWidth + barSpace) / 2;

    for (var i = 0; i < values.length; ++i) {
        c.strokeStyle = colors[i];
        c.fillStyle = colors[i];

        for (var j = 0; j < values[i].length; ++j) {
            if (values[i][j].Y != 0) {
                c.beginPath();
                c.moveTo(getXPixel(j, values[i]) - barWidth / 2 - offset + (barWidth + barSpace) * i, getYPixel(0));
                c.lineTo(getXPixel(j, values[i]) - barWidth / 2 - offset + (barWidth + barSpace) * i, getYPixel(values[i][j].Y));
                c.lineTo(getXPixel(j, values[i]) + barWidth / 2 - offset + (barWidth + barSpace) * i, getYPixel(values[i][j].Y));
                c.lineTo(getXPixel(j, values[i]) + barWidth / 2 - offset + (barWidth + barSpace) * i, getYPixel(0));
                c.stroke();
                c.fillRect(getXPixel(j, values[i]) - barWidth / 2 - offset + (barWidth + barSpace) * i, getYPixel(values[i][j].Y), barWidth, ((graph.height - yPadding) / maxY) * values[i][j].Y);
            }
        }
    }
}

document.addEventListener("DOMContentLoaded", function (event) {
    graph = document.getElementById("graph_elec");
    drawGraph(graph, data);

    graph = document.getElementById("graph_eau");
    drawGraph(graph, data);
});