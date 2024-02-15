
// Returns map of all photo path/description pairs
function pathMap() {
    const photoPath = "images/portfolio/";
    const photoPrefix = "PHOTO_";
    const imgFileType = ".jpg";


    // ADD NEW PHOTO TITLES HERE
    // Photo title/description pairs
    const photos = new Map([
        ["boathouse", "Aerial view of a large white mansion with a dock next to a body of water, surrounded by motorized boats."],
        ["bungalow", "Aerial view of a sun lit bungalow with a small backyard pool and tropical plants."],
        ["cabin", "Aerial view of tree tops with a small, wooden cabin protruding through a gap in the trees."],
        ["church", "Aerial view of a white church on a hill with nothing but blue sky and open ocean in the background"],
        ["cottage", "Aerial view of a vast, green landscape of farmland with a small brick house and swimming pool in the foregound."],
        ["courtyard", "Top-down view of a large, rectangular courtyard and pool, outlined with palm trees and surrounded by large apartment buildings."],
        ["hotel", "Aerial view of a city street corner with several large buildings with numerous windows."],
        ["island", "Aerial view of a small island covered in trees with a large, white building with a red roof in the center and a canyon in the background."],
        ["lakeside", "Aerial view of a large mansion on the lakeside, surrounded by green trees."],
        ["new-york", "A close up view of the top of a sky scraper that reads \"New Yorker\" in red letters."],
        ["park", "Top-down view of a green park with a circular concrete plaza and surrounding structures, with a giant golden dome in the center."],
        ["white-house", "Medium-sized, white-painted house with dark-grey shutters and a yard of green grass."]
    ]);

    const pathMap = new Map();

    // Update title key value with path value
    photos.forEach(function(description, title) {
        pathMap.set(photoPath + photoPrefix + title + imgFileType, description);
    });
    
    return pathMap;
}

// Create img elements from photos
// Returns array of elements
function getElements(photos) {

    const elements = new Array();

    photos.forEach(function(description, path) {

        const photoElement = document.createElement("img");
        photoElement.src = path;
        photoElement.alt = description;
        photoElement.classList.add("portfolio-photo");
        photoElement.classList.add("media-container");
        photoElement.setAttribute("onclick", "showcaseImage('" + photoElement.src + "', '" + photoElement.alt + "')");

        elements.push(photoElement);
    })

    return elements;
}

function hideColumns() {
    const column1 = document.getElementById("column1");
    const column2 = document.getElementById("column2");
    const column3 = document.getElementById("column3");

    column1.style.display = "none";
    column2.style.display = "none";
    column3.style.display = "none";
}

// Returns number of columns based on container width
function getNumColumns() {
    // 725px min width for 3 columns
    // 500px min width for 2 columns
    const gridWidth = document.getElementById("photoGrid").offsetWidth;
    const column1 = document.getElementById("column1");
    const column2 = document.getElementById("column2");
    const column3 = document.getElementById("column3");

    hideColumns();

    if (gridWidth <= 500) {
        column1.style.display = "flex";
        return 1;
    }
    else if (gridWidth <= 725) {
        column1.style.display = "flex";
        column2.style.display = "flex";
        return 2;
    }
    else {
        column1.style.display = "flex";
        column2.style.display = "flex";
        column3.style.display = "flex";
        return 3;
    }
}


// Returns column with shortest height
function shortestColumn(numCols) {
    const column1 = document.getElementById("column1");
    const column2 = document.getElementById("column2");
    const column3 = document.getElementById("column3");

    switch (numCols) {
        case 1:
            return column1;
        case 2:
            if (column1.offsetHeight <= column2.offsetHeight) {
                return column1;
            }
            else {
                return column2;
            }
        case 3:
            if ((column1.offsetHeight <= column2.offsetHeight) && (column1.offsetHeight <= column3.offsetHeight)) {
                return column1;
            }
            else if ((column2.offsetHeight <= column1.offsetHeight) && (column2.offsetHeight <= column3.offsetHeight)) {
                return column2;
            }
            else {
                return column3;
            }
    }
}

// Remove all images from a column
function clearColumns() {
    const column1 = document.getElementById("column1");
    const column2 = document.getElementById("column2");
    const column3 = document.getElementById("column3");
    const columns = [column1, column2, column3];
    columns.forEach(function(col) {
        while (col.firstChild) {
            col.removeChild(col.firstChild);
        }
    });
}

// Add photos to the page
function displayPhotos(photos, numCols) {

    // Reset columns
    clearColumns();
    
    // Add photo to shortest column
    photos.forEach(function(photo) {
        shortestColumn(numCols).appendChild(photo);
    });

    // Add styling to container
    document.getElementById("photoGrid").classList.add("photo-grid");
}

// Closes the video display if user clicks on the backdrop
function closeMedia(event) {
    if (!event.target.classList.contains("portfolio-photo")) {
        document.getElementById("mediaBackdrop").remove();
        document.body.style.overflowY = "auto";
    }
}

// Display larger version of image
function showcaseImage(src, alt) {
    if (document.querySelector("media-backdrop")) {
        document.getElementById("mediaBackdrop").remove();
    }
    // Create backdrop
    const backdrop = document.createElement("div");
    backdrop.classList.add("media-backdrop");
    backdrop.setAttribute("id", "mediaBackdrop");
    backdrop.setAttribute("onclick", "closeMedia(event)");

    // Create showcase container
    const showcaseContainer = document.createElement("div");
    showcaseContainer.setAttribute("id", "showcaseContainer");
    showcaseContainer.classList.add("showcase-container");

    // Create showcase image
    const showcase = document.createElement("img");
    showcase.src = src;
    showcase.alt = alt;
    showcase.classList.add("showcase-image");
    showcase.setAttribute("onload", "setMinHeight(this)");

    // Create X out
    const xOut = document.createElement("img");
    xOut.classList.add("x-out");
    xOut.src = "images/xOut.svg";

    // Stack elements
    showcaseContainer.appendChild(showcase);
    showcaseContainer.appendChild(xOut);
    backdrop.appendChild(showcaseContainer);

    // Display player
    document.getElementById("photos").appendChild(backdrop);

    // Disable body scrolling
    document.body.style.overflow = "hidden";
}

// Set min-height of showcase image to retain aspect ratio when min-width reached
function setMinHeight(img) {
    const aspectRatio = img.naturalWidth / img.naturalHeight;

    // get min-width value
    const styles = window.getComputedStyle(img);
    const minWidth = parseInt(styles.getPropertyValue("min-width"));

    // set min-height
    const minHeight = (minWidth / aspectRatio);
    img.style.minHeight = minHeight + "px";
}


const photos = getElements(pathMap());
let numCols = getNumColumns();
displayPhotos(photos, numCols);

// Adjust for window resize
window.addEventListener("resize", function() {
    let colCheck = getNumColumns();
    if (colCheck != numCols) {
        numCols = colCheck;
        document.getElementById("photoGrid").classList.remove("photo-grid");
        displayPhotos(photos, numCols);
        document.getElementById("photoGrid").classList.add("photo-grid");
    }
});
