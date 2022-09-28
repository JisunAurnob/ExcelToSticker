// function showLoading() {
//     document.querySelector('#loading').classList.add('loading');
//     document.querySelector('#loading-content').classList.add('loading-content');
// }

// function hideLoading() {
//     document.querySelector('#loading').classList.remove('loading');
//     document.querySelector('#loading-content').classList.remove('loading-content');
// }
function openForm() {
    document.querySelector('#tokenSection').classList.add('loading');
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
function tokenVisible() {
    if (document.getElementById("formFile").value != "") {
        document.getElementById("tokenSection").style.display = "block";
        document.getElementById("sbmtBt").style.display = "block";
        document.getElementById("nextButton").style.display = "none";
        document.getElementById("formFileErrorMsg").innerHTML = "";
        document.getElementById("tokenErrMsg").innerHTML = "";
        
    }
    else{
        document.getElementById("formFileErrorMsg").innerHTML = "Excel File Required";
    }
}