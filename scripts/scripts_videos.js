
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