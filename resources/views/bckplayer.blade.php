<html>
 <head>
  <title>
   BeatBuddy
  </title>
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
            justify-content: flex-start; /* Align items to the top */
            min-height: 100vh; /* Ensure the body takes at least the full height of the viewport */
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
            margin-left: 52px; /* Move the logo section to the right */
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
            margin-right: 83px; /* Move the search bar to the right */
        }
        .navbar .search-bar input {
            width: 100%;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            outline: none;
            font-size: 16px;
            box-sizing: border-box;
            padding-left: 40px; /* Add padding to move the text to the right */
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
            background: rgba(255, 255, 255, 0.1); /* Add background to player container */
            border-radius: 20px;
            padding: 30px; /* Increase padding to make the player larger */
            width: 85%; /* Increase width to make the player larger */
            max-width: 900px; /* Increase max-width to make the player larger */
            margin-top: 20px; /* Add margin to separate from navbar */
        }
        .player-container img {
            width: 100%;
            max-width: 350px; /* Increase max-width to make the image larger */
            border-radius: 10px;
        }
        .player-container .song-info {
            margin: 15px 0; /* Increase margin to make the player larger */
        }
        .player-container .song-info h2 {
            margin: 5px 0; /* Reduce margin to make the player more compact */
            font-size: 28px; /* Increase font size to make the text larger */
        }
        .player-container .song-info p {
            margin: 0;
            font-size: 20px; /* Increase font size to make the text larger */
            color: #ccc;
        }
        .player-container .controls {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px; /* Reduce margin to make the player more compact */
            gap: 99px; /* Add gap to make the controls more compact */
        }
        .player-container .controls i {
            font-size: 28px; /* Increase font size to make the icons larger */
            cursor: pointer;
        }
        .player-container .progress-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px; /* Reduce margin to make the player more compact */
        }
        .player-container .progress-bar {
            flex-grow: 1;
            height: 5px;
            background: #888;
            border-radius: 5px;
            margin: 0 10px; /* Reduce margin to make the player more compact */
            position: relative;
        }
        .player-container .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 50%;
            background: #00b4d8;
            border-radius: 5px;
        }
        .player-container .time {
            font-size: 16px; /* Increase font size to make the text larger */
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
        @media (max-width: 1200px) {
            .player-container {
                width: 90%;
                padding: 20px;
            }
            .player-container img {
                max-width: 300px; /* Adjust max-width for smaller screens */
            }
            .player-container .song-info h2 {
                font-size: 24px; /* Adjust font size for smaller screens */
            }
            .player-container .song-info p {
                font-size: 18px; /* Adjust font size for smaller screens */
            }
            .player-container .controls i {
                font-size: 24px; /* Adjust font size for smaller screens */
            }
            .player-container .time {
                font-size: 14px; /* Adjust font size for smaller screens */
            }
        }
        @media (max-width: 768px) {
            .navbar {
                padding: 20px;
            }
            .player-container {
                width: 95%;
                padding: 15px;
            }
            .player-container img {
                max-width: 250px; /* Adjust max-width for smaller screens */
            }
            .player-container .song-info h2 {
                font-size: 20px; /* Adjust font size for smaller screens */
            }
            .player-container .song-info p {
                font-size: 16px; /* Adjust font size for smaller screens */
            }
            .player-container .controls i {
                font-size: 20px; /* Adjust font size for smaller screens */
            }
            .player-container .time {
                font-size: 12px; /* Adjust font size for smaller screens */
            }
        }
  </style>
 </head>
 <body>
  <div class="navbar">
   <div class="top-section">
    <div class="logo-section">
     <img alt="BeatBuddy Logo" height="50" src="https://storage.googleapis.com/a1aa/image/isfdDZceChrifJl142gIfuwAxb6Cnxfp0uBUxbJV0UhqWTEgC.jpg" width="100"/>
     <div class="logo-text">
      BeatBuddy
     </div>
    </div>
    <div class="nav-links">
     <a href="/">
      Home
     </a>
     <a href="/nextup">
      Next Up
     </a>
     <a href="/music">
      Music
     </a>
    </div>
   </div>
   <div class="search-bar">
    <i class="fas fa-search">
    </i>
    <input placeholder="Search For Musics, Artists, ..." type="text"/>
   </div>
  </div>
  <div class="player-container">
   <img alt="Album cover of Circles by Post Malone" height="350" src="https://storage.googleapis.com/a1aa/image/7MKrezHNp2WTZKyQAhzuj1iEJFMF2myLYPgNe1opOHM3aiAUA.jpg" width="350"/>
   <div class="song-info">
    <h2>
     Circles
    </h2>
    <p>
     Post Malone
    </p>
   </div>
   <div class="progress-container">
    <span class="time">
     01.03
    </span>
    <div class="progress-bar">
    </div>
    <span class="time">
     04.03
    </span>
   </div>
   <div class="controls">
    <i class="fas fa-sync-alt">
    </i>
    <i class="fas fa-step-backward">
    </i>
    <i class="fas fa-play">
    </i>
    <i class="fas fa-step-forward">
    </i>
    <i class="fas fa-random">
    </i>
    <i class="fas fa-plus">
    </i>
   </div>
  </div>
  <div class="keluar">
   <a href="#">
    keluar
   </a>
  </div>
 </body>
</html>