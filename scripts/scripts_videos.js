
// Set background color of selector buttons
function selectBGColor(target) {
    let selectors = document.getElementsByClassName("selector");
    let selectorsArray = Array.from(selectors);
    
    selectorsArray.forEach(function (element) {
        if (element == target) {
            element.style.backgroundColor = "#2f7bc2";
        } else {
            element.style.backgroundColor = "#42576B";
        }   
    });
}

// Closes the video display if user clicks on the backdrop
function closeMedia(event) {
    if (!event.target.classList.contains("video-player")) {
        document.getElementById("mediaBackdrop").remove();
        document.body.style.overflowY = "auto";
    }
}

// Display video player
function playVideo(video, thumbnail) {
    if (document.querySelector("media-backdrop")) {
        document.getElementById("mediaBackdrop").remove();
    }
    // Create backdrop
    const backdrop = document.createElement("div");
    backdrop.classList.add("media-backdrop");
    backdrop.setAttribute("id", "mediaBackdrop");
    backdrop.setAttribute("onclick", "closeMedia(event)");

    // Create video box
    const videoBox = document.createElement("div");
    videoBox.classList.add("video-box");
    // Create video player
    const videoPlayer = document.createElement("video");
    videoPlayer.classList.add("video-player");
    videoPlayer.controls = true;
    videoPlayer.autoplay = true;
    videoPlayer.setAttribute("poster", thumbnail);
    // Create video source
    const source = document.createElement("source");
    source.src = video;
    source.type = "video/mp4";
    // Create X out
    const xOut = document.createElement("img");
    xOut.classList.add("x-out");
    xOut.src = "images/xOut.svg";

    // Stack elements
    videoPlayer.appendChild(source);
    videoBox.appendChild(videoPlayer);
    videoBox.appendChild(xOut);
    backdrop.appendChild(videoBox);

    // Display player
    document.getElementById("videos").appendChild(backdrop);

    // Display poster on video end
    videoPlayer.addEventListener("ended", function() {
        videoPlayer.autoplay = false;
        videoPlayer.currentTime = 0.0;
    })

    document.body.style.overflowY = "hidden";
}

// Param: path to background image / video file
function createVideoThumbnail(thumbnail, video) {
    // Create container
    const container = document.createElement("div");
    container.classList.add("media-container");
    container.classList.add("video-container");
    container.setAttribute("onclick", "playVideo('" + video + "', '" + thumbnail + "')");
    container.style.backgroundImage = "url(" + thumbnail + ")";

    // Create play button
    const playButton = document.createElement("img");
    playButton.src = "images/play-button.svg";
    playButton.classList.add("play-button");
    container.appendChild(playButton);

    document.getElementById("video-grid").appendChild(container);
}

// Param = "All", "Event", "Promotional", or "Cinema"
// Returns dictionary with video:thumbnail key/value pairs
function getVideos(type) {
    const videoPath = "video/portfolio-videos/";
    const thumbnailPath = "images/video-thumbnails/"
    const thumbnailPrefix = "THUMBNAIL-";
    const videoFileType = ".mp4";
    const imgFileType = ".jpg";

    result = new Map();

    // Get event videos/thumbnails
    function getEvents() {
        const folder = "Event/";
        const videoPrefix = "EVENT_";

        const eventVideos = [
            "balloons",
            "concert",
            "crowd",
            "fireworks",
        ];

        eventVideos.forEach(function(title) {
            result.set(videoPath + folder + videoPrefix + title + videoFileType,
                thumbnailPath + folder + thumbnailPrefix + videoPrefix + title + imgFileType);
        });
    }

    // Get promotional videos/thumbnails
    function getPromos() {
        const folder = "Promotional/";
        const videoPrefix = "PROMO_";

        const promoVideos = [
            "district",
            "glass-building",
            "ship",
            "sky-scraper"
        ];

        promoVideos.forEach(function(title) {
            result.set(videoPath + folder + videoPrefix + title + videoFileType,
                thumbnailPath + folder + thumbnailPrefix + videoPrefix + title + imgFileType);;
        });
    }

    // Get cinematic videos/thumbnails
    function getCinemas() {
        const folder = "Cinematic/";
        const videoPrefix = "CINEMA_";

        const cinemaVideos = [
            "dirt-bike",
            "forest-road",
            "mountain",
            "snowscape"
        ];

        cinemaVideos.forEach(function(title) {
            result.set(videoPath + folder + videoPrefix + title + videoFileType,
                thumbnailPath + folder + thumbnailPrefix + videoPrefix + title + imgFileType);;
        });
    }

    // Get videos based on type selected
    switch (type) {
        case "All":
            getEvents();
            getPromos();
            getCinemas();
            break;
        case "Event":
            getEvents();
            break;
        case "Promotional":
            getPromos();
            break;
        case "Cinema":
            getCinemas();
            break;
    }
    
    return result;
}

// Clear contents of a container
function clearContainer(id) {
    container = document.getElementById(id);

    while (container.firstChild) {
        container.removeChild(container.firstChild);
    }
}

// Set dropdown selected
function setDropdown(target) {
    const dropdown = document.getElementById("selector-dropdown");
    switch (target.textContent) {
        case "All":
            dropdown.options.selectedIndex = 0;
            break;
        case "Event":
            dropdown.options.selectedIndex = 1;
            break;
        case "Promotional":
            dropdown.options.selectedIndex = 2;
            break;
        case "Cinematic":
            dropdown.options.selectedIndex = 3;
            break;
    }
}

// Display videos based on selector
function select(target) {
    // Reset grid
    clearContainer("video-grid");

    // Fill grid
    videos = getVideos(target.textContent);
    videos.forEach(function(video, thumbnail) {
        createVideoThumbnail(video, thumbnail);
    })

    // Adjust mobile dropdown
    setDropdown(target);
}

// Default load all
document.addEventListener("DOMContentLoaded", function() {
    select(document.getElementById("selector-default"));
});
