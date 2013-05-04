$(function() {
		$( "#datepicker" ).datepicker();
});

$(function() {
		$( "#datepicker1" ).datepicker();
});

function init() {
        var bHaveFileAPI = (window.File && window.FileReader);

        if (!bHaveFileAPI) {
            alert("This browser doesn't support the File API");
            return;
        }

        document.getElementById("logo").addEventListener("change", onFileChanged);
}
function onFileChanged(theEvt) {
        // get the file from the event information
        var thefile = theEvt.target.files[0];

        // display the file data
        var str = thefile.type.toString().substring(0,5);

        if(str!="image"){
            alert("please select an image");
        }
    }

window.addEventListener("load",init);