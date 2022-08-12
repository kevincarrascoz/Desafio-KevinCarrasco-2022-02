const audio1 = document.getElementById("audio2");
const playPause1 = document.getElementById("play2");

playPause1.addEventListener("click", () => {
  if (audio1.paused || audio1.ended) {
    playPause1.querySelector(".pause-btn").classList.toggle("hide");
    playPause1.querySelector(".play-btn").classList.toggle("hide");
    audio1.play();
  } else {
    audio1.pause();
    playPause1.querySelector(".pause-btn").classList.toggle("hide");
    playPause1.querySelector(".play-btn").classList.toggle("hide");
  }
});

const audio2 = document.getElementById("audio3");
const playPause2 = document.getElementById("play3");

playPause2.addEventListener("click", () => {
  if (audio2.paused || audio2.ended) {
    playPause2.querySelector(".pause-btn").classList.toggle("hide");
    playPause2.querySelector(".play-btn").classList.toggle("hide");
    audio2.play();
  } else {
    audio2.pause();
    playPause2.querySelector(".pause-btn").classList.toggle("hide");
    playPause2.querySelector(".play-btn").classList.toggle("hide");
  }
});

const audio3 = document.getElementById("audio4");
const playPause3 = document.getElementById("play4");

playPause3.addEventListener("click", () => {
  if (audio3.paused || audio3.ended) {
    playPause3.querySelector(".pause-btn").classList.toggle("hide");
    playPause3.querySelector(".play-btn").classList.toggle("hide");
    audio3.play();
  } else {
    audio3.pause();
    playPause3.querySelector(".pause-btn").classList.toggle("hide");
    playPause3.querySelector(".play-btn").classList.toggle("hide");
  }
});

