let mic = document.querySelector('.mic');

function isEven(a){
    if(a%2 == 0){
        return true;
    }
    else{
        return false;
    }
}

async function speechToText() {
    try {
        let b = 0;
        let n = 0;
        let output = "";
        let numbers = "";
        let pi = "3.1415926535897932384626433832795028841971693993751058209749445923078164062862089986280348253421170679";
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        const recognition = new webkitSpeechRecognition() || new SpeechRecognition();
        recognition.lang = 'en-US';
        recognition.interimResults = false;
        recognition.maxAlternatives = 1;
    
        recognition.onerror = (event) => {
            console.error('Speech recognition error:', event.error);
        };
        
        recognition.onresult = (event) => {
            const result = event.results[0][0].transcript;
            
            console.log('Recognized:', result);

            // output = result.split(' ');

            // let a = output.join('');

            // output = a.split('');

            for(let i=0; i<result.length; i++){
                if(result[i] !== " "){
                    output += result[i];
                }
            }

            console.log(output);

            for(let i=0; i<pi.length; i++){
                if(output[i] === pi[i]){
                    numbers += output[i];
                }
                else{
                    break;
                }
            }

            for(let j=2; j<numbers.length; j++){
                n++;
            }

            document.getElementById("speechoutput").innerHTML = numbers;
            document.getElementById("numberofpi").innerHTML = `The number of correct digits mentioned is ${n}`;

            mic.src = "media/icons/microphone.png";
            
        };

        mic.addEventListener('click', function(){
            b++;

            if(isEven(b)){
                recognition.onend = () => {
                    console.log('Speech recognition ended.');
                };

                
            }
            else{
                recognition.start();
                console.log('Speech recognition started...');
                document.getElementById("speechoutput").innerHTML = "";
                result = "";
                output = "";     
                numbers = "";
                mic.src = "media/icons/active-mic.png";
            }
        })
    
  
    } catch (error) {
      console.error('Error:', error);
    }
  }

  speechToText();

//   let pi = "3.1415926535897932384626433832795028841971693993751058209749445923078164062862089986280348253421170679";

//   console.log(pi.length);