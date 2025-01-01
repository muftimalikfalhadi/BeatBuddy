<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BeatBuddy</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
  <style>
    body {
      margin: 0;
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(to bottom, #0f2027, #203a43, #2c5364);
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      min-height: 100vh;
    }
    .navbar {
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px 50px;
    }
    .navbar .top-section {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .navbar .logo-section {
      display: flex;
      align-items: center;
      margin-left: 52px;
    }
    .navbar img {
      height: 50px;
    }
    .navbar .logo-text {
      margin-left: 10px;
      font-size: 24px;
      font-weight: 700;
      color: #00b4d8;
    }
    .navbar .nav-links {
      display: flex;
      gap: 20px;
    }
    .navbar .nav-links a {
      color: white;
      text-decoration: none;
      font-size: 18px;
    }
    .navbar .search-bar {
      width: 100%;
      max-width: 600px;
      margin-top: 20px;
      position: relative;
      margin-right: 83px;
    }
    .navbar .search-bar input {
      width: 100%;
      padding: 10px 20px;
      border-radius: 20px;
      border: none;
      outline: none;
      font-size: 16px;
      box-sizing: border-box;
      padding-left: 40px;
    }
    .navbar .search-bar i {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-50%);
      color: #888;
    }
    .player-container {
      text-align: center;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 30px;
      width: 85%;
      max-width: 900px;
      margin-top: 20px;
    }
    .player-container img {
      width: 100%;
      max-width: 350px;
      border-radius: 10px;
    }
    .player-container .song-info {
      margin: 15px 0;
    }
    .player-container .song-info h2 {
      margin: 5px 0;
      font-size: 28px;
    }
    .player-container .song-info p {
      margin: 0;
      font-size: 20px;
      color: #ccc;
    }
    .player-container .controls {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 10px;
      gap: 20px;
    }
    .player-container .controls i {
      font-size: 28px;
      cursor: pointer;
    }
    .player-container .progress-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 10px;
      width: 100%;
      padding: 0 20px;
    }
    .player-container .progress-bar {
      flex-grow: 1;
      height: 5px;
      background: #888;
      border-radius: 5px;
      margin: 0 10px;
      position: relative;
      cursor: pointer;
    }
    .player-container .progress-bar .progress-filled {
      height: 100%;
      background: #00b4d8;
      border-radius: 5px;
      width: 0%;
      transition: width 0.1s;
    }
    .player-container .time {
      font-size: 16px;
      color: #ccc;
    }
    .keluar {
      margin-top: 20px;
      text-align: center;
    }
    .keluar a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      background: #00b4d8;
      padding: 10px 20px;
      border-radius: 20px;
      transition: background 0.3s;
    }
    .keluar a:hover {
      background: #0077a3;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <div class="top-section">
      <div class="logo-section">
        <img alt="BeatBuddy Logo" height="50" src="https://storage.googleapis.com/a1aa/image/isfdDZceChrifJl142gIfuwAxb6Cnxfp0uBUxbJV0UhqWTEgC.jpg" width="100"/>
        <div class="logo-text">BeatBuddy</div>
      </div>
      <div class="nav-links">
        <a href="/">Home</a>
        <a href="/nextup">Next Up</a>
        <a href="/music">Music</a>
      </div>
    </div>
    <div class="search-bar">
      <i class="fas fa-search"></i>
      <input placeholder="Search For Musics, Artists, ..." type="text"/>
    </div>
  </div>

  <!-- Audio element -->
  <audio id="audioPlayer" preload="auto"></audio>

  <div class="player-container">
    <img alt="Album cover" id="albumCover" height="350" width="350"/>
    <div class="song-info">
      <h2 id="songTitle">Circles</h2>
      <p id="songArtist">Post Malone</p>
    </div>
    <div class="progress-container">
      <span class="time" id="currentTime">01:03</span>
      <div class="progress-bar" id="progressBar">
        <div class="progress-filled"></div>
      </div>
      <span class="time" id="duration">04:03</span>
    </div>
    <div class="controls">
      <i class="fas fa-sync" id="repeat"></i>
      <i class="fas fa-step-backward" id="prev"></i>
      <i class="fas fa-play" id="playPause"></i>
      <i class="fas fa-step-forward" id="next"></i>
      <i class="fas fa-random" id="shuffle"></i>
      <i class="fas fa-plus" id="add"></i>
    </div>
  </div>
  <div class="keluar">
    <!-- <a href="#">keluar</a> -->
  </div>

  <script>
    // Playlist array
    const playlist = {!! json_encode($formattedPlaylist) !!}

    // const playlist = [
    //   { url: 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3', title: 'Circles', artist: 'Post Malone', cover: 'https://storage.googleapis.com/a1aa/image/7MKrezHNp2WTZKyQAhzuj1iEJFMF2myLYPgNe1opOHM3aiAUA.jpg' },
    //   { url: 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3', title: 'Blinding Lights', artist: 'The Weeknd', cover: 'https://via.placeholder.com/350x350' },
    //   { url: 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3', title: 'Levitating', artist: 'Dua Lipa', cover: 'https://via.placeholder.com/350x350' },
    // ];

    let currentTrackIndex = 0;
    let isShuffling = false;
    let isRepeating = false;

    const audioPlayer = document.getElementById('audioPlayer');
    const playPauseBtn = document.getElementById('playPause');
    const progressBar = document.getElementById('progressBar');
    const progressFilled = document.querySelector('.progress-filled');
    const currentTimeElem = document.getElementById('currentTime');
    const durationElem = document.getElementById('duration');
    const songTitle = document.getElementById('songTitle');
    const songArtist = document.getElementById('songArtist');
    const albumCover = document.getElementById('albumCover');
    const repeatBtn = document.getElementById('repeat');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    const shuffleBtn = document.getElementById('shuffle');

    function loadTrack(trackIndex) {
      const track = playlist[trackIndex];
      audioPlayer.src = track.url;
      songTitle.textContent = track.title;
      songArtist.textContent = track.artist;
      albumCover.src = track.cover;
      audioPlayer.load();
      audioPlayer.play();
      playPauseBtn.classList.replace('fa-play', 'fa-pause');
    }

    function updateProgress() {
      const currentTime = audioPlayer.currentTime;
      const duration = audioPlayer.duration;
      const progressPercent = (currentTime / duration) * 100;
      progressFilled.style.width = `${progressPercent}%`;

      currentTimeElem.textContent = formatTime(currentTime);
      durationElem.textContent = formatTime(duration);
    }

    function formatTime(seconds) {
      const mins = Math.floor(seconds / 60);
      const secs = Math.floor(seconds % 60);
      return `${mins < 10 ? '0' : ''}${mins}:${secs < 10 ? '0' : ''}${secs}`;
    }

    function nextTrack() {
      currentTrackIndex = (currentTrackIndex + 1) % playlist.length;
      loadTrack(currentTrackIndex);
    }

    function prevTrack() {
      currentTrackIndex = (currentTrackIndex - 1 + playlist.length) % playlist.length;
      loadTrack(currentTrackIndex);
    }

    function toggleShuffle() {
      isShuffling = !isShuffling;
      shuffleBtn.classList.toggle('active', isShuffling);
    }

    function toggleRepeat() {
      isRepeating = !isRepeating;
      repeatBtn.classList.toggle('active', isRepeating);
    }

    function playPause() {
      if (audioPlayer.paused) {
        audioPlayer.play();
        playPauseBtn.classList.replace('fa-play', 'fa-pause');
      } else {
        audioPlayer.pause();
        playPauseBtn.classList.replace('fa-pause', 'fa-play');
      }
    }

    // Event listeners
    playPauseBtn.addEventListener('click', playPause);
    nextBtn.addEventListener('click', nextTrack);
    prevBtn.addEventListener('click', prevTrack);
    shuffleBtn.addEventListener('click', toggleShuffle);
    repeatBtn.addEventListener('click', toggleRepeat);

    audioPlayer.addEventListener('timeupdate', updateProgress);
    audioPlayer.addEventListener('ended', () => {
      if (isRepeating) {
        audioPlayer.currentTime = 0;
        audioPlayer.play();
      } else if (isShuffling) {
        currentTrackIndex = Math.floor(Math.random() * playlist.length);
        loadTrack(currentTrackIndex);
      } else {
        nextTrack();
      }
    });

    progressBar.addEventListener('click', function(e) {
      const progressBarWidth = progressBar.offsetWidth;
      const clickX = e.offsetX;
      const duration = audioPlayer.duration;
      const seekTime = (clickX / progressBarWidth) * duration;
      audioPlayer.currentTime = seekTime;
    });

    loadTrack(currentTrackIndex); // Load first track
  </script>
</body>
</html>