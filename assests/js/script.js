//data table
$('#customerTable').DataTable();

//delete button
$(".delete").click(function(e){
    
    var r = confirm('Are you sure you want to delete?');
    if(r != true)
    {
        return false;
    }
   
})
//reset button
$(".reset").click(function(e){
    var l = confirm('Are you sure you want to reset the data?');
    if(l == true)
    {
        //clear or reset form value
        document.getElementById("firstname").value = '';
        document.getElementById("lastname").value = '';
        document.getElementById("email").value = '';
        document.getElementById("city").value = '';
        document.getElementById("country").value = '';
        document.getElementById("image").value = '';
        document.getElementById("firstname").focus();
    }
    else{
        return false;
    }
   
})


//Image Preview
var loadFile = function(event) {
var reader = new FileReader();
reader.onload = function(){
    var output = document.getElementById('output');
    output.src = reader.result;
};
reader.readAsDataURL(event.target.files[0]);
};


//calculator

$(document).ready(function(){
    var displayValue = '0';   
    $("#result",window.parent.document).val(displayValue)
    $('.key').each(function(index, key){       
        $(this).click(function(e){
            if(displayValue == '0') displayValue = '';
            if($(this).text() == 'C')
            {
                displayValue = '0';
                $("#result",window.parent.document).val(displayValue)
            }
            else if($(this).text() == '=')
            {
                try
                {
                    displayValue = eval(displayValue);
                    $("#result",window.parent.document).val(displayValue)
                    displayValue = '0';
                }
                catch (e)
                {
                    displayValue = '0';
                    $("#result",window.parent.document).val('ERROR')
                }               
            }
            else
            {
                displayValue += $(this).text();
                $("#result",window.parent.document).val(displayValue)
            }
            e.preventDefault()
        })
    })
})

//gooogle api Screen share

const videoElem = document.getElementById("video");
const logElem = document.getElementById("log");
const startElem = document.getElementById("start");
const stopElem = document.getElementById("stop");

// Options for getDisplayMedia()

var displayMediaOptions = {
  video: {
    cursor: "always"
  },
  audio: true
};

// Set event listeners for the start and stop buttons
startElem.addEventListener("click", function(evt) {
  startCapture();
}, false);

stopElem.addEventListener("click", function(evt) {
  stopCapture();
}, false);


async function startCapture() {
    logElem.innerHTML = "";
    try {
      videoElem.srcObject = await navigator.mediaDevices.getDisplayMedia(displayMediaOptions);
      dumpOptionsInfo();
    } catch(err) { 
      console.error("Error: " + err);
    }
}
function stopCapture(evt) {
    let tracks = videoElem.srcObject.getTracks();
  
    tracks.forEach(track => track.stop());
    videoElem.srcObject = null;
}

console.log = msg => logElem.innerHTML += `${msg}<br>`;
console.error = msg => logElem.innerHTML += `<span class="error">${msg}</span><br>`;
console.warn = msg => logElem.innerHTML += `<span class="warn">${msg}<span><br>`;
console.info = msg => logElem.innerHTML += `<span class="info">${msg}</span><br>`;
function dumpOptionsInfo() {
    const videoTrack = videoElem.srcObject.getVideoTracks()[0];
   
    console.info("Track settings:");
    console.info(JSON.stringify(videoTrack.getSettings(), null, 2));
    console.info("Track constraints:");
    console.info(JSON.stringify(videoTrack.getConstraints(), null, 2));
}