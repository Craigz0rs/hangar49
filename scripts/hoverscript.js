var tile = document.getElementsByClassName("aircraft_tile")[0];
tile.onclick = function() {
 // Trigger the `onhover` event on the paragraph
 tile.onhover.call(tile);
};