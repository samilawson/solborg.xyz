//Special Scripts for Mobile Devices

var links = document.getElementsByTagName("a");
for (var i = 0; i < links.length; i++) {
    if (links[i].className.includes("pagination") === false) links[i].href = "#";
}
