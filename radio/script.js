music.sort();
var musicInfo = "";

for (var i = 1; i < music.length; i ++) {
    if (music[i][0] != music[i - 1][0]) musicInfo += "</ul><h2>" + music[i][0] + "</h2><ul>";
    musicInfo += "<li onclick='loadPiece(" + i + ")'>" + music[i][1] + " played by " + music[i][2] + "</li>";
}

document.getElementById("menu").innerHTML = musicInfo;

function loadPiece(x) {
    document.getElementById("nowplaying").innerHTML = music[x][1] + " by <b>" + music[x][0] + "</b>";
    document.getElementById("player").src = "https://www.youtube.com/embed/" + music[x][3];
}