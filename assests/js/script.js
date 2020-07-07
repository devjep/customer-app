$('#customerTable').DataTable();

//Image Preview
var loadFile = function(event) {
var reader = new FileReader();
reader.onload = function(){
    var output = document.getElementById('output');
    output.src = reader.result;
};
reader.readAsDataURL(event.target.files[0]);
};

//clear or reset form value
function reset() {
    
    document.getElementById("firstname").value = '';
    document.getElementById("lastname").value = '';
    document.getElementById("email").value = '';
    document.getElementById("city").value = '';
    document.getElementById("country").value = '';
    document.getElementById("image").value = '';
    document.getElementById("firstname").focus();
    
 }

//calculator
$(document).ready(function(){
    var displayValue = '0';   
    $('#result').text(displayValue);

    $('.key').each(function(index, key){       
        $(this).click(function(e){
            if(displayValue == '0') displayValue = '';
            if($(this).text() == 'C')
            {
                displayValue = '0';
                $('#result').text(displayValue);
            }
            else if($(this).text() == '=')
            {
                try
                {
                    displayValue = eval(displayValue);
                    $('#result').text(displayValue);
                    displayValue = '0';
                }
                catch (e)
                {
                    displayValue = '0';
                    $('#result').text('ERROR');
                }               
            }
            else
            {
                displayValue += $(this).text();
                $('#result').text(displayValue);
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
  audio: false
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

